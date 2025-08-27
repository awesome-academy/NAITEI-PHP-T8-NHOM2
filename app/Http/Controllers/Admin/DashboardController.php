<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Feedback;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboardData = $this->getDashboardData();
        return view('admin.dashboard', $dashboardData);
    }

    private function getDashboardData()
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        // Basic Statistics
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // Recent Statistics (Last 30 days)
        $recentOrders = Order::whereBetween('order_date', [$startDate, $endDate])->count();
        $recentRevenue = Order::where('status', 'completed')
            ->whereBetween('order_date', [$startDate, $endDate])
            ->sum('total_amount');
        $newUsers = User::whereBetween('created_at', [$startDate, $endDate])->count();
        $newProducts = Product::whereBetween('created_at', [$startDate, $endDate])->count();

        // Order Status Breakdown
        $orderStatuses = $this->getOrderStatusBreakdown();

        // Revenue Trend (Last 7 days)
        $revenueTrend = $this->getRevenueTrend(7);

        // Top Products by Sales
        $topProducts = $this->getTopProductsBySales(5);

        // Recent Orders
        $recentOrdersList = Order::with('user')
            ->orderBy('order_date', 'desc')
            ->take(10)
            ->get();

        // User Registration Trend (Last 7 days)
        $userRegistrationTrend = $this->getUserRegistrationTrend(7);

        // Product Stock Status
        $stockStatus = $this->getProductStockStatus();

        // Customer Satisfaction
        $customerSatisfaction = $this->getCustomerSatisfaction();

        return [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'recentOrders' => $recentOrders,
            'recentRevenue' => $recentRevenue,
            'newUsers' => $newUsers,
            'newProducts' => $newProducts,
            'orderStatuses' => $orderStatuses,
            'revenueTrend' => $revenueTrend,
            'topProducts' => $topProducts,
            'recentOrdersList' => $recentOrdersList,
            'userRegistrationTrend' => $userRegistrationTrend,
            'stockStatus' => $stockStatus,
            'customerSatisfaction' => $customerSatisfaction,
        ];
    }

    private function getOrderStatusBreakdown()
    {
    return Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->keyBy('status')
            ->map(function ($item) {
                return $item->count;
            })
             ->toArray();
    }

    private function getRevenueTrend($days)
    {
        $trend = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $revenue = Order::where('status', 'completed')
                ->whereDate('order_date', $date)
                ->sum('total_amount');
            
            $trend[] = [
                'date' => Carbon::parse($date)->format('M d'),
                'revenue' => $revenue,
                'full_date' => $date,
            ];
        }
        return $trend;
    }

    private function getTopProductsBySales($limit)
    {
        return Product::select(
                'products.products_id',
                'products.categories_id',
                'products.product_name',
                'products.description',
                'products.product_price',
                'products.stock_quantity',
                'products.image_path',
                'products.specifications',
                'products.slug',
                'products.status',
                'products.rating_count',
                'products.rating_avg'
            )
            ->leftJoin('order_items', 'products.products_id', '=', 'order_items.products_id')
            ->selectRaw('COALESCE(SUM(order_items.quantity), 0) as total_sold')
            ->selectRaw('COALESCE(SUM(order_items.price * order_items.quantity), 0) as total_revenue')
            ->with('category')
            ->groupBy(
                'products.products_id',
                'products.categories_id',
                'products.product_name',
                'products.description',
                'products.product_price',
                'products.stock_quantity',
                'products.image_path',
                'products.specifications',
                'products.slug',
                'products.status',
                'products.rating_count',
                'products.rating_avg'
            )
            ->orderByDesc('total_sold')
            ->take($limit)
            ->get();
    }

    private function getUserRegistrationTrend($days)
    {
        $trend = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $users = User::whereDate('created_at', $date)->count();

            $trend[] = [
                'date' => Carbon::parse($date)->format('M d'),
                'users' => $users,
                'full_date' => $date,
            ];
        }
        return $trend;
    }

    private function getProductStockStatus()
    {
        $outOfStock = Product::where('stock_quantity', 0)->count();
        $lowStock = Product::where('stock_quantity', '<=', 10)->where('stock_quantity', '>', 0)->count();
        $inStock = Product::where('stock_quantity', '>', 10)->count();

        return [
            'out_of_stock' => $outOfStock,
            'low_stock' => $lowStock,
            'in_stock' => $inStock,
        ];
    }

    private function getCustomerSatisfaction()
    {
        $aggregates = Feedback::visible()
            ->selectRaw('COUNT(*) as total_reviews, AVG(rating) as average_rating')
            ->first();
        
        $totalReviews = (int) $aggregates->total_reviews;
        $averageRating = $totalReviews > 0 ? (float) $aggregates->average_rating : 0;
        
        $ratingDistribution = Feedback::visible()
            ->select('rating', DB::raw('count(*) as count'))
            ->groupBy('rating')
            ->orderBy('rating', 'desc')
            ->get()
            ->keyBy('rating')
            ->map(function ($item) {
                return $item->count;
            });
        
        return [
            'total_reviews' => $totalReviews,
            'average_rating' => round($averageRating, 1),
            'rating_distribution' => $ratingDistribution,
        ];
    }
}