<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('orders.order_details') }}{{ $order->orders_id }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
        <p><strong>{{ __('orders.order_status') }}:</strong> {{ $order->status }}</p>
        <p><strong>{{ __('common.recipient_name') }}:</strong> {{ $order->recipient_name }}</p>
        <p><strong>{{ __('common.recipient_email') }}:</strong> {{ $order->recipient_email }}</p>
        <p><strong>{{ __('common.recipient_phone') }}:</strong> {{ $order->recipient_phone }}</p>
        <p><strong>{{ __('orders.shipping_address') }}:</strong> {{ $order->shipping_address }}</p>
        <p><strong>{{ __('orders.payment_method') }}:</strong> {{ $order->payment_method }}</p>
        <p><strong>{{ __('orders.order_date_colon') }}</strong> {{ optional($order->order_date)->format('d/m/Y H:i') }}</p>

        <h2 class="text-lg font-bold mt-4 mb-2">{{ __('orders.products') }}</h2>
        <table class="w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">{{ __('orders.product') }}</th>
                    <th class="p-2 border">{{ __('orders.qty') }}</th>
                    <th class="p-2 border">{{ __('orders.price') }}</th>
                    <th class="p-2 border">{{ __('orders.subtotal') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                    <td class="py-3">
                        @php $p = $item->product; @endphp

                        @if($p && !$p->trashed() && $p->status)  {{-- SP còn tồn tại, đang hiển thị --}}
                        <a href="{{ route('user.products.show', ['product' => $p->slug]) }}"
                            class="text-black-600 hover:underline"
                            target="_blank" rel="noopener">
                            {{ $p->product_name }}
                        </a>
                        @else
                        {{-- SP đã xoá: chỉ hiển thị tên, không link --}}
                        <span class="text-gray-500">
                            {{ $p?->product_name ?? __('orders.product_not_exist') }}
                        </span>
                        @endif
                    </td>

                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 0, ',', '.') }} đ</td>
                    <td class="text-right">{{ number_format($item->sub_total, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-4">
            <p><strong>{{ __('common.subtotal') }}:</strong> {{ number_format($order->total_amount - $order->shipping_fee, 0, ',', '.') }} đ</p>
            <p><strong>{{ __('common.shipping_fee') }}:</strong> {{ number_format($order->shipping_fee, 0, ',', '.') }} đ</p>
            <p class="text-lg font-bold"><strong>{{ __('orders.total_colon') }}</strong> {{ number_format($order->total_amount, 0, ',', '.') }} đ</p>
        </div>
    </div>
</x-user-layout>
