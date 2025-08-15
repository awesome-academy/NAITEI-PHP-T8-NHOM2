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
    public function add($productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = Shopping_cart::where('user_id', Auth::id())
            ->where('products_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Shopping_cart::create([
                'user_id'     => Auth::id(),
                'products_id' => $productId,
                'quantity'    => 1,
            ]);
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



