<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('common.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg p-6 text-white">
                    <h1 class="text-2xl font-bold mb-2">{{ __('common.dashboard') }}</h1>
                    <p class="text-blue-50">{{ __('common.welcome_admin') }}</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Orders Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <dt class="text-sm font-medium text-gray-600">{{ __('common.total_orders') }}</dt>
                                <dd class="mt-2 text-3xl font-bold text-gray-900">{{ number_format($totalOrders) }}</dd>
                                <div class="mt-1 flex items-center text-sm text-green-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    +{{ $recentOrders }} {{ __('common.last_30_days') }}
                                </div>
                            </div>
                            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <dt class="text-sm font-medium text-gray-600">{{ __('common.total_revenue') }}</dt>
                                <dd class="mt-2 text-3xl font-bold text-gray-900">{{ number_format($totalRevenue, 0, ',', '.') }} ₫</dd>
                                <div class="mt-1 flex items-center text-sm text-green-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ number_format($recentRevenue, 0, ',', '.') }} ₫ {{ __('common.last_30_days') }}
                                </div>
                            </div>
                            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <dt class="text-sm font-medium text-gray-600">{{ __('common.total_users') }}</dt>
                                <dd class="mt-2 text-3xl font-bold text-gray-900">{{ number_format($totalUsers) }}</dd>
                                <div class="mt-1 flex items-center text-sm text-green-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    +{{ $newUsers }} {{ __('common.this_month') }}
                                </div>
                            </div>
                            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                                <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Products Card -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <dt class="text-sm font-medium text-gray-600">{{ __('common.total_products') }}</dt>
                                <dd class="mt-2 text-3xl font-bold text-gray-900">{{ number_format($totalProducts) }}</dd>
                                <div class="mt-1 flex items-center text-sm text-green-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    +{{ $newProducts }} {{ __('common.this_month') }}
                                </div>
                            </div>
                            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                                <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Revenue Trend Chart -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.revenue_trend') }} ({{ __('common.last_7_days') }})</h3>
                    <div class="h-64">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Order Status Chart -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.order_status_distribution') }}</h3>
                    <div class="h-64">
                        <canvas id="orderStatusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Orders -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.recent_orders') }}</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('common.id') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('common.customer') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('common.order_date_colon') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('common.total') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('common.status') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentOrdersList as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->orders_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->order_date->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($order->total_amount, 0, ',', '.') }} ₫</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @php
                                                    $statusClass = match($order->status) {
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'processing' => 'bg-blue-100 text-blue-800',
                                                        'shipping' => 'bg-purple-100 text-purple-800',
                                                        'completed' => 'bg-green-100 text-green-800',
                                                        'cancelled' => 'bg-red-100 text-red-800',
                                                        default => 'bg-gray-100 text-gray-800'
                                                    };
                                                @endphp
                                                {{ $statusClass }}">
                                                {{ __('common.' . $order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.top_products_by_sales') }}</h3>
                         <div class="space-y-4">
            @foreach($topProducts as $product)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors min-h-[4rem]">
                <div class="flex items-center flex-1 min-w-0 mr-4">
                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-md flex items-center justify-center text-white font-bold">
                        {{ Str::upper(Str::limit($product->product_name, 1, '')) }}
                    </div>
                    <div class="ml-4 min-w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-900 truncate">{{ $product->product_name }}</dt>
                        <dd class="text-sm text-gray-500">{{ number_format($product->total_sold) }} {{ __('common.sold') }}</dd>
                    </div>
                </div>
                <div class="text-sm font-medium text-gray-900 flex-shrink-0 text-right">
                    {{ number_format($product->total_revenue, 0, ',', '.') }} ₫
                </div>
            </div>
            @endforeach
        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Statistics Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <!-- Stock Status -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.product_stock_status') }}</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <span class="text-sm font-medium text-green-800">{{ __('common.in_stock') }} (>10)</span>
                                <span class="text-sm font-bold text-green-600">{{ $stockStatus['in_stock'] }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                                <span class="text-sm font-medium text-yellow-800">{{ __('common.low_stock') }} (≤10)</span>
                                <span class="text-sm font-bold text-yellow-600">{{ $stockStatus['low_stock'] }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg">
                                <span class="text-sm font-medium text-red-800">{{ __('common.out_of_stock') }}</span>
                                <span class="text-sm font-bold text-red-600">{{ $stockStatus['out_of_stock'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Satisfaction -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.customer_satisfaction') }}</h3>
                        <div class="text-center mb-4">
                            <div class="text-4xl font-bold text-yellow-400 mb-2">{{ $customerSatisfaction['average_rating'] ?? '-' }}</div>
                            <div class="text-sm text-gray-500 mb-1">out of 5 stars</div>
                            <div class="text-sm text-gray-500">({{ $customerSatisfaction['total_reviews'] }} {{ __('common.reviews') }})</div>
                        </div>
                        <div class="space-y-2">
                            @for($i = 5; $i >= 1; $i--)
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-gray-600 w-8">{{ $i }}</span>
                                    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-2 rounded-full transition-all duration-300" style="width: {{
                                            (
                                                (method_exists($customerSatisfaction['rating_distribution'] ?? null, 'get')
                                                    ? $customerSatisfaction['rating_distribution']->get($i, 0)
                                                    : (is_array($customerSatisfaction['rating_distribution'] ?? null) ? ($customerSatisfaction['rating_distribution'][$i] ?? 0) : 0)
                                                )
                                                / max(1, $customerSatisfaction['total_reviews'])
                                            ) * 100
                                        }}%"></div>
                                        
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-md">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('common.recent_activity') }}</h3>
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-green-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <div class="w-3 h-3 bg-green-400 rounded-full mt-1"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $newUsers }} {{ __('common.new_users') }} {{ __('common.this_month') }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $newProducts }} {{ __('common.new_products') }} added</p>
                                </div>
                            </div>
                            <div class="flex items-start p-4 bg-blue-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <div class="w-3 h-3 bg-blue-400 rounded-full mt-1"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $recentOrders }} {{ __('common.orders') }} {{ __('common.this_month') }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ number_format($recentRevenue, 0, ',', '.') }} ₫ {{ __('common.revenue') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Revenue Trend Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: @json(array_column($revenueTrend, 'date')),
                datasets: [{
                    label: '{{ __('common.revenue') }}',
                    data: @json(array_column($revenueTrend, 'revenue')),
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return '{{ __('common.revenue') }}: ₫' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₫' + value.toLocaleString();
                            },
                            color: '#6B7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });

        // Order Status Chart
        const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
        const orderStatusChart = new Chart(orderStatusCtx, {
            type: 'doughnut',
            data: {
                labels: @json(array_map(fn($status) => __('common.' . $status), array_keys($orderStatuses))),
                datasets: [{
                    data: @json(array_values($orderStatuses)),
                    backgroundColor: [
                        'rgb(251, 191, 36)',  // yellow
                        'rgb(59, 130, 246)',  // blue
                        'rgb(147, 51, 234)',  // purple
                        'rgb(34, 197, 94)',   // green
                        'rgb(239, 68, 68)'    // red
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            color: '#374151'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + ' {{ __("common.orders") }}';
                            }
                        }
                    }
                },
                cutout: '60%'
            }
        });
    </script>
</x-admin-layout>
