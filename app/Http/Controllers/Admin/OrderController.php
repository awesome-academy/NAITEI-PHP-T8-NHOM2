<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateOrderStatusRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders with search and filter functionality.
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderItems.product']);

        // Use model scopes for cleaner, more maintainable code
        
        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $query->byDateRange($request->date_from, $request->date_to);
        }

        $query->latest('order_date');

        $orders = $query->paginate(10)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified order with detailed information.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        
        // Get available next statuses based on current status
        $availableStatuses = $order->getAvailableNextStatuses();
        
        return view('admin.orders.show', compact('order', 'availableStatuses'));
    }

    /**
     * Update the order status.
     */
    public function updateStatus(UpdateOrderStatusRequest $request, Order $order)
    {
        $newStatus = $request->validated()['status'];
        
        // Validate status transition
        if (!$order->canTransitionTo($newStatus)) {
            return redirect()->back()
                ->with('error', "Cannot change status from '{$order->status}' to '{$newStatus}'.");
        }

        // Set delivery date when order is completed
        if ($newStatus === Order::STATUS_COMPLETED && !$order->delivery_date) {
            $order->delivery_date = now();
        }
        $oldStatus = $order->status;
        
        $order->update(['status' => $newStatus]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', "Order status updated from '{$oldStatus}' to '{$newStatus}' successfully.");
    }
}