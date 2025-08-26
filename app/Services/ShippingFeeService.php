<?php

namespace App\Services;

use App\Interfaces\ShippingFeeServiceInterface;
use App\Models\Province;

class ShippingFeeService implements ShippingFeeServiceInterface
{
    public function calculateFee(float $weight, string $destination, float $subtotal): float
    {
        // Miễn phí ship nếu tổng phụ > 2.000.000
        if ($subtotal > 2000000) {
            return 0;
        }
        $province = Province::where('name', $destination)->first();
        if ($province) {
            return $province->shipping_fee;
        }
        // Default fee if province not found
        return 35000;
    }
}
