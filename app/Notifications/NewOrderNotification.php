<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Order;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Add 'broadcast' if using realtime
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Đơn hàng mới vừa được tạo')
            ->greeting('Xin chào Admin,')
            ->line('Có đơn hàng mới vừa được tạo bởi người dùng: ' . $this->order->user->name)
            ->line('Mã đơn hàng: ' . $this->order->orders_id)
            ->line('Tổng tiền: ' . number_format($this->order->total_amount, 0, ',', '.') . ' ₫')
            ->action('Xem đơn hàng', url('/admin/orders/' . $this->order->orders_id))
            ->line('Vui lòng kiểm tra và xử lý đơn hàng này.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->orders_id,
            'user_id' => $this->order->user_id,
            'user_name' => $this->order->user->name,
            'total_amount' => $this->order->total_amount,
            'created_at' => $this->order->created_at,
        ];
    }

    // If using realtime/broadcast
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'order_id' => $this->order->orders_id,
            'user_id' => $this->order->user_id,
            'user_name' => $this->order->user->name,
            'total_amount' => $this->order->total_amount,
            'created_at' => $this->order->created_at,
        ]);
    }
}
