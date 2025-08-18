<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Order_items as OrderItem;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the test user and product
        $user = User::where('email', 'test@gmail.com')->first();
        $product = Product::find(1);

        if (!$user) {
            $this->command->error('User with email test@gmail.com not found!');
            return;
        }

        if (!$product) {
            $this->command->error('Product with ID 1 not found!');
            return;
        }

        $statuses = [Order::STATUS_PENDING];
        $paymentMethods = ['COD'];

        // Create 15 sample orders
        for ($i = 1; $i <= 15; $i++) {
            $quantity = rand(1, 5);
            $price = $product->product_price; 
            $subtotal = $price * $quantity;
            
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $subtotal,
                'status' => $statuses[array_rand($statuses)],
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'shipping_address' => $this->generateRandomAddress(),
                'order_date' => Carbon::now()->subDays(rand(1, 90))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'delivery_date' => rand(0, 1) ? Carbon::now()->addDays(rand(1, 14)) : null,
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);

            // Create order item
            OrderItem::create([
                'orders_id' => $order->orders_id,
                'products_id' => $product->products_id,
                'quantity' => $quantity,
                'price' => $price,
                'sub_total' => $subtotal,
            ]);

            $this->command->info("Created order #{$order->orders_id} with {$quantity} items");
        }

        $this->command->info('Order seeding completed successfully!');
    }

    /**
     * Generate a random shipping address
     */
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

        return $addresses[array_rand($addresses)];
    }
}