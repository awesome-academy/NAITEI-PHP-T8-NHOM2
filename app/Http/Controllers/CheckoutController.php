<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Product;
use App\Models\Shopping_cart;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ShippingFeeServiceInterface;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Notifications\NewOrderNotification;

class CheckoutController extends Controller
{
    protected $shippingFeeService;

    public function __construct(ShippingFeeServiceInterface $shippingFeeService)
    {
        $this->shippingFeeService = $shippingFeeService;
    }
    /**
     * Hiển thị form thanh toán
     */
    public function checkoutForm()
    {
        $cartItems = Shopping_cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $addresses = Auth::user()->addresses()->with('province')->get();
        $provinces = \App\Models\Province::all();

        return view('checkout.index', compact('cartItems', 'addresses', 'provinces'));
    }

    /**
     * Xử lý đặt hàng
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'recipient_email' => 'required|email|max:255',
            'recipient_phone' => 'required|string|max:20',
            'province_id' => 'required|exists:provinces,id',
            'shipping_address' => 'required|string|max:255',
            'payment_method'   => 'required|string|max:50'
        ]);

        $cartItems = Shopping_cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // 1. Tính tổng tiền
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->product_price * $item->quantity;
        });

        // Calculate shipping fee
        $province = \App\Models\Province::find($request->province_id);
        $totalWeight = $cartItems->sum(function ($item) {
            return ($item->product->weight ?? 1) * $item->quantity;
        });
        $shippingFee = $this->shippingFeeService->calculateFee($totalWeight, $province->name, $totalAmount);
        $totalAmount += $shippingFee;

        // 2. Lưu đơn hàng
        $order = Order::create([
            'user_id'         => Auth::id(),
            'total_amount'    => $totalAmount,
            'status'          => 'pending',
            'shipping_address'=> $request->shipping_address,
            'payment_method'  => $request->payment_method,
            'order_date'      => Carbon::now(),
            'shipping_fee'    => $shippingFee,
            'recipient_name'  => $request->recipient_name,
            'recipient_email' => $request->recipient_email,
            'recipient_phone' => $request->recipient_phone,
        ]);

        // 3. Lưu chi tiết đơn hàng và trừ tồn kho
        foreach ($cartItems as $item) {
            Order_items::create([
                'orders_id'   => $order->orders_id,
                'products_id' => $item->products_id,
                'quantity'    => $item->quantity,
                'price'       => $item->product->product_price,
                'sub_total'   => $item->product->product_price * $item->quantity,
            ]);

            // Trừ số lượng tồn kho
            $item->product->decrement('stock_quantity', $item->quantity);
        }

        // 4. Xóa giỏ hàng sau khi đặt
        Shopping_cart::where('user_id', Auth::id())->delete();

        // 5. Gửi thông báo cho admin
        $order->load('user');
        $admins = \App\Models\User::where('role', 'admin')->get();
        Notification::send($admins, new NewOrderNotification($order));

        // 6. Chuyển hướng về trang chi tiết đơn hàng
        return redirect()->route('orders.show', $order->orders_id)
            ->with('success', 'Đơn hàng đã được đặt thành công!');
    }

    /**
     * Hiển thị chi tiết đơn hàng
     */
    public function showOrder($id)
    {
        $order = Order::with('orderItems.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
