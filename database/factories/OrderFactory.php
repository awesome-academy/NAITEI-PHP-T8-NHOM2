<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $status = Arr::random(Order::getAllStatuses());
        $orderDate = Carbon::now()
            ->subDays($this->faker->numberBetween(0, 30))
            ->subHours($this->faker->numberBetween(0, 23));

        return [
            'user_id'          => User::factory(),
            'total_amount'     => $this->faker->randomFloat(2, 100000, 3000000),
            'status'           => $status,
            'shipping_address' => $this->faker->address(),
            'payment_method'   => $this->faker->randomElement(['COD', 'Bank']),
            'order_date'       => $orderDate,
            'delivery_date'    => in_array($status, [Order::STATUS_COMPLETED, Order::STATUS_SHIPPING], true)
                                   ? (clone $orderDate)->addDays($this->faker->numberBetween(1, 7))
                                   : null,
        ];
    }
}
