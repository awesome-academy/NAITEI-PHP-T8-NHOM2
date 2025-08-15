<x-user-layout>
    <x-slot name="header">
        Chi tiết đơn hàng #{{ $order->orders_id }}
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
        <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
        <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>

        <h2 class="text-lg font-bold mt-4 mb-2">Sản phẩm</h2>
        <table class="w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Sản phẩm</th>
                    <th class="p-2 border">Số lượng</th>
                    <th class="p-2 border">Giá</th>
                    <th class="p-2 border">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td class="p-2 border">{{ $item->product->product_name }}</td>
                        <td class="p-2 border">{{ $item->quantity }}</td>
                        <td class="p-2 border">{{ number_format($item->price, 0, ',', '.') }} đ</td>
                        <td class="p-2 border">{{ number_format($item->sub_total, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-lg font-bold">
            Tổng cộng: {{ number_format($order->total_amount, 0, ',', '.') }} đ
        </div>
    </div>
</x-user-layout>

