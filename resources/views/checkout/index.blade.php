<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Thanh toán</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <h2 class="text-lg font-bold mb-4">Thông tin giao hàng</h2>

            <div class="mb-4">
                <label class="block font-medium mb-1">Địa chỉ giao hàng</label>
                <input type="text" name="shipping_address" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Phương thức thanh toán</label>
                <select name="payment_method" class="w-full border p-2 rounded" required>
                    <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                    <option value="Bank">Chuyển khoản ngân hàng</option>
                </select>
            </div>

            <h2 class="text-lg font-bold mb-4">Sản phẩm</h2>
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
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $subTotal = $item->product->product_price * $item->quantity;
                            $total += $subTotal;
                        @endphp
                        <tr>
                            <td class="p-2 border">{{ $item->product->product_name }}</td>
                            <td class="p-2 border">{{ $item->quantity }}</td>
                            <td class="p-2 border">{{ number_format($item->product->product_price, 0, ',', '.') }} đ</td>
                            <td class="p-2 border">{{ number_format($subTotal, 0, ',', '.') }} đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center">
                <div class="text-lg font-bold">Tổng cộng: {{ number_format($total, 0, ',', '.') }} đ</div>
                <button type="submit" class="checkout-confirm-btn">Xác nhận đặt hàng</button>
            </div>
        </form>
    </div>
</x-user-layout>

<style>
.checkout-confirm-btn {
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.querySelector('.checkout-confirm-btn');
    if (btn) {
        btn.addEventListener('mouseover', function() {
            btn.style.backgroundColor = '#333';
        });
        btn.addEventListener('mouseout', function() {
            btn.style.backgroundColor = 'black';
        });
    }
});
</script>
