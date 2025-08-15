<x-user-layout>
    <x-slot name="header">
        Giỏ hàng
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
        @if($cartItems->count() > 0)
            <table class="w-full border mb-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">Sản phẩm</th>
                        <th class="p-2 border">Giá</th>
                        <th class="p-2 border">Số lượng</th>
                        <th class="p-2 border">Tổng</th>
                        <th class="p-2 border">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $subTotal = $item->product->product_price * $item->quantity;
                            $total += $subTotal;
                        @endphp
                        <tr data-id="{{ $item->cart_id }}">
                            <td class="p-2 border">{{ $item->product->product_name }}</td>
                            <td class="p-2 border">{{ number_format($item->product->product_price, 0, ',', '.') }} đ</td>
                            <td class="p-2 border text-center">
                                <div class="flex justify-center items-center">
                                    <button class="qty-btn px-2 border" data-change="-1">-</button>
                                    <input type="number" class="qty-input w-16 text-center border-t border-b" value="{{ $item->quantity }}" min="1">
                                    <button class="qty-btn px-2 border" data-change="1">+</button>
                                </div>
                            </td>
                            <td class="p-2 border sub-total">{{ number_format($subTotal, 0, ',', '.') }} đ</td>
                            <td class="p-2 border text-center">
                                <form action="{{ route('cart.remove', $item->cart_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red;">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center">
                <div class="text-lg font-bold">
                    Tổng cộng: <span id="total-price">{{ number_format($total, 0, ',', '.') }} đ</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="checkout-btn">Đặt hàng</a>
            </div>
        @else
            <p>Giỏ hàng của bạn đang trống.</p>
        @endif
    </div>

    {{-- Script tăng giảm số lượng --}}
    <script>
        document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                let row = this.closest('tr');
                let input = row.querySelector('.qty-input');
                let change = parseInt(this.dataset.change);
                let newQty = Math.max(1, parseInt(input.value) + change);
                input.value = newQty;

                updateCart(row.dataset.id, newQty, row);
            });
        });

        function updateCart(cartId, qty, row) {
            fetch(`/cart/update/${cartId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: qty })
            })
            .then(res => res.json())
            .then(data => {
                row.querySelector('.sub-total').textContent = data.sub_total;
                document.getElementById('total-price').textContent = data.total;
            })
            .catch(err => console.error(err));
        }
    </script>
</x-user-layout>

<style>
.checkout-btn {
    display: inline-block;
    padding: 10px 16px;
    background-color: black;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.checkout-btn:hover {
    background-color: #333;
}

</style>