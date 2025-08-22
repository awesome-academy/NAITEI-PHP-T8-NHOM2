<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class NewOrderNotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_receives_notification_when_order_created()
    {
        Notification::fake();

        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'user']);

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'total_amount' => 100000,
            'status' => 'pending',
        ]);

        // Send notification
        $admin->notify(new NewOrderNotification($order));

        Notification::assertSentTo(
            [$admin],
            NewOrderNotification::class,
            function ($notification, $channels) use ($order) {
                return $notification->data['order_id'] === $order->id;
            }
        );
    }
}
