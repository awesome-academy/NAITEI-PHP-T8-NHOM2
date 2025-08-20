<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Order;
use App\Models\Order_items as OrderItem;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy 1 nhóm user role=user đã seed sẵn
        $users = User::where('role', 'user')->inRandomOrder()->take(25)->get();
        if ($users->isEmpty()) {
            $this->command->error('No users found to create orders!');
            return;
        }

        // Lấy toàn bộ sản phẩm đang active
        $products = Product::active()->get();
        if ($products->isEmpty()) {
            $this->command->error('No active products found!');
            return;
        }

        // Pool trạng thái (thiên về COMPLETED để có feedback)
        $statusPool = [
            Order::STATUS_COMPLETED,
            Order::STATUS_COMPLETED,
            Order::STATUS_SHIPPING,
            Order::STATUS_PROCESSING,
            Order::STATUS_PENDING,
        ];
        $paymentMethods = ['COD', 'Bank'];

        foreach ($users as $user) {
            // Mỗi user 2–5 đơn
            $orderCount = rand(2, 5);

            for ($i = 0; $i < $orderCount; $i++) {
                $status    = Arr::random($statusPool);
                $orderDate = Carbon::now()
                    ->subDays(rand(1, 60))
                    ->subHours(rand(0, 23))
                    ->subMinutes(rand(0, 59));

                // Tạo đơn rỗng trước, lát nữa cộng total_amount
                $order = Order::create([
                    'user_id'          => $user->id,
                    'total_amount'     => 0,
                    'status'           => $status,
                    'payment_method'   => Arr::random($paymentMethods),
                    'shipping_address' => $this->generateRandomAddress(),
                    'order_date'       => $orderDate,
                    'delivery_date'    => $status === Order::STATUS_COMPLETED
                        ? (clone $orderDate)->addDays(rand(1, 7))
                        : null,
                ]);

                // -------- 1–3 item/đơn (chuẩn hóa kiểu trả về) --------
                $pickCount = min(rand(1, 3), $products->count());
                $selected  = $products->random($pickCount);

                // random(1) => Model; random(n>1) => Collection
                $items = $selected instanceof \Illuminate\Support\Collection
                    ? $selected
                    : collect([$selected]);

                $total = 0;
                foreach ($items as $p) {
                    $qty   = rand(1, 3);
                    $price = (float) $p->product_price;
                    $sub   = $qty * $price;

                    OrderItem::create([
                        'orders_id'   => $order->orders_id,
                        'products_id' => $p->products_id,
                        'quantity'    => $qty,
                        'price'       => $price,
                        'sub_total'   => $sub,
                    ]);

                    $total += $sub;
                }

                $order->update(['total_amount' => $total]);

                $this->command->info("User {$user->id} -> order #{$order->orders_id} ({$status}) - items: {$order->orderItems()->count()}");
            }
        }

        $this->command->info('Order seeding completed successfully!');
    }

    private function generateRandomAddress(): string
    {
        $addresses = [
            '123 Main Street, Apt 4B, New York, NY 10001',
            '456 Oak Avenue, Los Angeles, CA 90210',
            '789 Pine Road, Unit 12, Chicago, IL 60601',
            '321 Elm Street, Houston, TX 77001',
            '654 Maple Drive, Phoenix, AZ 85001',
            '987 Cedar Lane, Philadelphia, PA 19101',
            '147 Birch Boulevard, San Antonio, TX 78201',
            '258 Willow Way, San Diego, CA 92101',
            '369 Ash Court, Dallas, TX 75201',
            '741 Spruce Street, San Jose, CA 95101',
        ];

        return Arr::random($addresses);
    }
}
