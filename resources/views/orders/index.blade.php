<x-app-layout>
    <x-slot name="header">
        Đơn hàng của tôi
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        @if($orders->count() > 0)
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">Mã đơn</th>
                        <th class="p-2 border">Ngày đặt</th>
                        <th class="p-2 border">Tổng tiền</th>
                        <th class="p-2 border">Trạng thái</th>
                        <th class="p-2 border">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="p-2 border">#{{ $order->orders_id }}</td>
                            <td class="p-2 border">{{ $order->order_date ? $order->order_date->format('d/m/Y H:i') : '' }}</td>
                            <td class="p-2 border">{{ number_format($order->total_amount, 0, ',', '.') }} đ</td>
                            <td class="p-2 border">
                                @php
                                    $color = match($order->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'processing' => 'bg-blue-100 text-blue-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-2 py-1 rounded text-sm font-medium {{ $color }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="p-2 border">
                                <a href="{{ route('orders.show', $order->orders_id) }}" 
                                   class="text-blue-600 hover:underline">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Bạn chưa có đơn hàng nào.</p>
        @endif
    </div>
</x-app-layout>
