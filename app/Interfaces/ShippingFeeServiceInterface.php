<?php

namespace App\Interfaces;

interface ShippingFeeServiceInterface
{
    public function calculateFee(float $weight, string $destination, float $subtotal): float;
}
