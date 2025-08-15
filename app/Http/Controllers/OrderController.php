<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with('orderItems.product')
            ->where('user_id', Auth::id())
            ->orderBy('order_date', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('orderItems.product')
            ->where('user_id', Auth::id())
            ->where('orders_id', $id)
            ->firstOrFail();

        return view('orders.show', compact('order'));
    }
}
