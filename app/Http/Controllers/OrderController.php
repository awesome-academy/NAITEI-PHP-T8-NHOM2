<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Order::with('orderItems.product');
        
        if ($s = trim((string)$request->get('search'))) {
                $query->search($s);                 // search theo orders_id
            }

        if ($st = $request->get('status')) {
            $query->byStatus($st);
            }

        if ($date = $request->get('date')) {
            $query->whereDate('order_date', $date);
        }

        $orders = $query
            ->where('user_id', Auth::id())
            ->orderBy('order_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        $statuses = Order::getAllStatuses();

        return view('orders.index', compact('orders', 'statuses'));
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
