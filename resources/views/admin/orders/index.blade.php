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

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Orders</h1>
                    </div>

                    <!-- Compact Search and Filter Form -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <form method="GET" action="{{ route('admin.orders.index') }}">
                            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3 mb-3">
                                <!-- Search -->
                                <div class="lg:col-span-2">
                                    <input type="text" name="search" id="search"
                                           value="{{ request('search') }}"
                                           placeholder="Search orders, customers..."
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                                </div>

                                <!-- Status Filter -->
                                <div>
                                    <select name="status" id="status"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                                        <option value="">All Statuses</option>
                                        @foreach(\App\Models\Order::getAllStatuses() as $statusOption)
                                            <option value="{{ $statusOption }}"
                                                    {{ request('status') == $statusOption ? 'selected' : '' }}>
                                                {{ ucfirst($statusOption) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date From -->
                                <div>
                                    <input type="date" name="date_from" id="date_from"
                                           value="{{ request('date_from') }}"
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                                </div>

                                <!-- Date To -->
                                <div>
                                    <input type="date" name="date_to" id="date_to"
                                           value="{{ request('date_to') }}"
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                                        Filter
                                    </button>
                                    <a href="{{ route('admin.orders.index') }}"
                                       class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:border-blue-300 focus:ring ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">
                                        Clear
                                    </a>
                                </div>
                                
                                <div class="text-sm text-gray-600">
                                    Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} orders
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Orders Table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Order ID</th>
                                    <th scope="col" class="px-6 py-3">Customer</th>
                                    <th scope="col" class="px-6 py-3">Total</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Date</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900">#{{ $order->orders_id }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $order->user->name }}</div>
                                                <div class="text-gray-500 text-xs">{{ $order->user->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-semibold text-gray-900">{{ number_format($order->total_amount, 0) }}đ</div>
                                            <div class="text-xs text-gray-500">{{ ucfirst($order->payment_method ?? 'N/A') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($order->getStatusColor() == 'yellow') bg-yellow-100 text-yellow-800
                                                @elseif($order->getStatusColor() == 'blue') bg-blue-100 text-blue-800
                                                @elseif($order->getStatusColor() == 'purple') bg-purple-100 text-purple-800
                                                @elseif($order->getStatusColor() == 'green') bg-green-100 text-green-800
                                                @elseif($order->getStatusColor() == 'red') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800
                                                @endif">
                                                {{ $order->formatted_status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-gray-900">{{ $order->order_date ? $order->order_date->format('M d, Y') : 'N/A' }}</div>
                                            <div class="text-xs text-gray-500">{{ $order->order_date ? $order->order_date->format('H:i') : '' }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('admin.orders.show', $order) }}"
                                               class="font-medium text-blue-600 hover:underline">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                
                                                <p class="text-lg font-medium">No orders found</p>
                                                <p class="text-sm">Try adjusting your search or filter criteria</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>