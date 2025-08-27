<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyRevenueReportNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $date,      // YYYY-MM-DD (theo timezone app)
        public int    $orders,    // số đơn
        public float  $revenue    // tổng doanh thu
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Revenue Report – {$this->date}")
            ->greeting('Báo cáo doanh thu hằng ngày')
            ->line("Ngày báo cáo: {$this->date}")
            ->line("Số đơn: {$this->orders}")
            ->line('Doanh thu: ' . number_format($this->revenue, 0, ',', '.') . ' đ')
            ->line('— Hệ thống tự động gửi từ ứng dụng');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
