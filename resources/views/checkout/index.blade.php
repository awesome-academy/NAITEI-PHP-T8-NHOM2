<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('common.checkout') }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <h2 class="text-lg font-bold mb-4">{{ __('common.shipping_information') }}</h2>

            <div class="mb-4">
                <label for="address_id" class="block font-medium mb-1">{{ __('common.select_address') }}</label>
                <select name="address_id" id="address_id" class="w-full border p-2 rounded">
                    <option value="">{{ __('common.select_address_placeholder') }}</option>
                    @foreach ($addresses as $address)
                        <option value="{{ $address->id }}" data-address="{{ json_encode($address) }}" {{ $address->is_default ? 'selected' : '' }}>
                            {{ $address->recipient_name }} - {{ $address->address }}, {{ $address->province->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">{{ __('common.recipient_name') }}</label>
                <input type="text" name="recipient_name" class="w-full border p-2 rounded" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">{{ __('common.recipient_email') }}</label>
                <input type="email" name="recipient_email" class="w-full border p-2 rounded" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">{{ __('common.recipient_phone') }}</label>
                <input type="text" name="recipient_phone" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="province_id" class="block text-sm font-medium text-gray-700">Province</label>
                <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" data-fee="{{ $province->shipping_fee }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">{{ __('common.shipping_address') }}</label>
                <input type="text" name="shipping_address" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">{{ __('common.payment_method') }}</label>
                <select name="payment_method" class="w-full border p-2 rounded" required>
                    <option value="COD">{{ __('common.payment_cod') }}</option>
                    <option value="Bank">{{ __('common.payment_bank') }}</option>
                </select>
            </div>

            <h2 class="text-lg font-bold mb-4">{{ __('products.products') }}</h2>
            <table class="w-full border mb-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">{{ __('products.product') }}</th>
                        <th class="p-2 border">{{ __('products.quantity') }}</th>
                        <th class="p-2 border">{{ __('products.price') }}</th>
                        <th class="p-2 border">{{ __('common.total') }}</th>
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

            <div class="text-right mb-4">
                <div class="text-lg font-bold">{{ __('common.subtotal') }}: {{ number_format($total, 0, ',', '.') }} đ</div>
                <div class="text-lg font-bold">{{ __('common.shipping_fee') }}: <span id="shipping_fee">0</span> đ</div>
                <div class="text-lg font-bold">{{ __('common.grand_total') }}: <span id="grand_total">{{ number_format($total, 0, ',', '.') }}</span> đ</div>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="checkout-confirm-btn">{{ __('common.confirm_order') }}</button>
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
        const addressSelect = document.getElementById('address_id');
        const recipientNameInput = document.querySelector('input[name="recipient_name"]');
        const recipientPhoneInput = document.querySelector('input[name="recipient_phone"]');
        const provinceSelect = document.getElementById('province_id');
        const shippingAddressInput = document.querySelector('input[name="shipping_address"]');
        const shippingFeeSpan = document.getElementById('shipping_fee');
        const grandTotalSpan = document.getElementById('grand_total');
        const subtotal = parseFloat('{{ $total }}');

        function updateShippingFee() {
            const selectedProvince = provinceSelect.options[provinceSelect.selectedIndex];
            let fee = 0;
            if (subtotal > 2000000) {
                fee = 0;
            } else if (selectedProvince) {
                fee = parseFloat(selectedProvince.dataset.fee) || 0;
            }
            shippingFeeSpan.textContent = fee.toLocaleString('vi-VN');
            grandTotalSpan.textContent = (subtotal + fee).toLocaleString('vi-VN');
        }

        addressSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption && selectedOption.value) {
                const addressData = JSON.parse(selectedOption.dataset.address);
                recipientNameInput.value = addressData.recipient_name;
                recipientPhoneInput.value = addressData.recipient_phone;
                provinceSelect.value = addressData.province_id;
                shippingAddressInput.value = addressData.address;
            } else {
                recipientNameInput.value = '{{ auth()->user()->name }}';
                recipientPhoneInput.value = '';
                provinceSelect.value = '';
                shippingAddressInput.value = '';
            }
            updateShippingFee();
        });

        provinceSelect.addEventListener('change', updateShippingFee);

        // Trigger change on page load to set initial values
        if (addressSelect) {
            addressSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
