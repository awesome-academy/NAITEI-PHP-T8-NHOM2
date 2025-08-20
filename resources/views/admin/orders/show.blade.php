<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-800">{{ __('orders.order') }} #{{ $order->orders_id }}</h1>
                            <span class="ml-4 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                @if($order->getStatusColor() == 'yellow') bg-yellow-100 text-yellow-800
                                @elseif($order->getStatusColor() == 'blue') bg-blue-100 text-blue-800
                                @elseif($order->getStatusColor() == 'purple') bg-purple-100 text-purple-800
                                @elseif($order->getStatusColor() == 'green') bg-green-100 text-green-800
                                @elseif($order->getStatusColor() == 'red') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $order->formatted_status }}
                            </span>
                        </div>
                        <a href="{{ route('admin.orders.index') }}"
                           class="text-sm text-gray-600 hover:text-gray-900 underline">
                            {{ __('orders.back_to_orders') }}
                        </a>
                    </div>

                    @if(count($availableStatuses) > 0)
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                            <h3 class="text-lg font-medium text-blue-900 mb-3">{{ __('orders.update_order_status') }}</h3>
                            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex items-center space-x-4">
                                @csrf
                                @method('PATCH')
                                
                                <div class="flex-1 max-w-xs mr-2">
                                    <select name="status" id="status" required
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">{{ __('orders.select_new_status') }}</option>
                                        @foreach($availableStatuses as $status)
                                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" style="background-color: #2563eb; color: white; padding: 8px 24px; border: none; border-radius: 6px; font-weight: 600;">
                                    {{ __('orders.update_status') }}
                                </button>
                            </form>
                            
                            <div class="mt-3 text-sm text-blue-700">
                                <p><strong>{{ __('orders.available_transitions') }}</strong> {{ implode(', ', array_map('ucfirst', $availableStatuses)) }}</p>
                            </div>
                        </div>
                    @else
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('orders.order_status') }}</h3>
                            <p class="text-gray-600">
                                {{ __('orders.cannot_be_changed_further', ['status' => $order->formatted_status]) }}
                            </p>
                        </div>
                    @endif

                    <!-- Order Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <!-- Customer Card -->
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">{{ __('orders.customer') }}</h3>
                            <div class="space-y-2">
                                <div class="font-medium text-gray-900">{{ $order->user->name }}</div>
                                <div class="text-gray-600">{{ $order->user->email }}</div>
                                <div class="text-gray-600">{{ $order->user->phone ?? 'No phone' }}</div>
                            </div>
                        </div>

                        <!-- Order Info Card -->
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">{{ __('orders.order_info') }}</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('orders.date') }}:</span>
                                    <span class="font-medium">{{ $order->order_date ? $order->order_date->format('M d, Y') : 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('orders.payment') }}:</span>
                                    <span class="font-medium">{{ ucfirst($order->payment_method ?? 'N/A') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('orders.items') }}:</span>
                                    <span class="font-medium">{{ $order->orderItems->count() }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Total Card -->
                        <div class="bg-white border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">{{ __('orders.total') }}</h3>
                            <div class="text-3xl font-bold text-green-600">{{ number_format($order->total_amount, 0) }}đ</div>
                            <div class="text-sm text-gray-600 mt-1">
                                {{ $order->delivery_date ? __('orders.delivery') . ': ' . $order->delivery_date->format('M d, Y') : __('orders.delivery_date_not_set') }}
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">{{ __('orders.shipping_address') }}</h3>
                        <p class="text-gray-700">{{ $order->shipping_address }}</p>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">{{ __('orders.order_items') }}</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('orders.product') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('orders.price') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('orders.qty') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('orders.subtotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->product->product_name ?? __('orders.product_not_found') }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ number_format($item->price, 0) }}đ
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ number_format($item->sub_total, 0) }}đ
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="bg-gray-50">
                                        <td colspan="3" class="px-6 py-4 text-sm font-medium text-gray-900 text-right">
                                            {{ __('orders.total_colon') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                            {{ number_format($order->total_amount, 0) }}đ
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>