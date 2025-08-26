<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shopping_cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cartItems = Shopping_cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $qty = max(1, (int) $request->input('qty', 1));

        if ($product->stock_quantity <= 0) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Sản phẩm đã hết hàng.']);
            }
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng!');
        }

        $cartItem = Shopping_cart::where('user_id', Auth::id())
            ->where('products_id', $id)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity >= $product->stock_quantity) {
                if ($request->wantsJson()) {
                    $cartCount = Shopping_cart::where('user_id', Auth::id())->count();
                    return response()->json([
                        'success' => false,
                        'message' => 'Số lượng sản phẩm trong giỏ đã đạt tối đa.',
                        'cartCount' => $cartCount
                    ]);
                }
                return redirect()->back()->with('error', 'Số lượng sản phẩm trong giỏ đã đạt tối đa.');
            }

            $newQuantity = $cartItem->quantity + $qty;
            $cartItem->quantity = min($newQuantity, $product->stock_quantity);
            $cartItem->save();
        } else {
            if ($qty > $product->stock_quantity) {
                if ($request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => 'Không đủ số lượng sản phẩm.']);
                }
                return redirect()->back()->with('error', 'Không đủ số lượng sản phẩm.');
            }

            Shopping_cart::create([
                'user_id'     => Auth::id(),
                'products_id' => $id,
                'quantity'    => $qty,
            ]);
        }

        if ($request->wantsJson()) {
            $cartCount = Shopping_cart::where('user_id', Auth::id())->count();
            return response()->json(['success' => true, 'cartCount' => $cartCount]);
        }

        // nếu redirect=checkout thì đi thẳng tới checkout
        $redirect = $request->query('redirect');
        if ($redirect === 'checkout') {
            return redirect()->route('checkout.index')
                ->with('success', 'Đã thêm vào giỏ, chuyển tới thanh toán.');
        }
        if ($redirect === 'cart') {
            return redirect()->route('cart.index')
                ->with('success', 'Đã thêm vào giỏ hàng.');
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    // Cập nhật số lượng (AJAX)
    public function update(Request $request, $cartId)
    {
        $cartItem = Shopping_cart::with('product')
            ->where('user_id', Auth::id())
            ->findOrFail($cartId);

        $cartItem->quantity = max(1, (int) $request->quantity);
        $cartItem->save();

        $subTotal = $cartItem->product->product_price * $cartItem->quantity;

        $total = Shopping_cart::where('user_id', Auth::id())
            ->with('product')
            ->get()
            ->sum(fn($item) => $item->product->product_price * $item->quantity);

        return response()->json([
            'sub_total' => number_format($subTotal, 0, ',', '.') . ' đ',
            'total'     => number_format($total, 0, ',', '.') . ' đ'
        ]);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($cartId)
    {
        Shopping_cart::where('user_id', Auth::id())
            ->where('cart_id', $cartId)
            ->delete();

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công!');
    }
}
