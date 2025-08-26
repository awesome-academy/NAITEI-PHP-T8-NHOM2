<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'orders_id';
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'payment_method',
        'order_date',
        'delivery_date',
        'shipping_fee',
        'recipient_name',
        'recipient_email',
        'recipient_phone'
    ];
    
    protected $casts = [
        'order_date' => 'datetime',
        'delivery_date' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    // Order status constants
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPING = 'shipping';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Status transition rules
    const STATUS_TRANSITIONS = [
        self::STATUS_PENDING => [self::STATUS_PROCESSING, self::STATUS_CANCELLED],
        self::STATUS_PROCESSING => [self::STATUS_SHIPPING],
        self::STATUS_SHIPPING => [self::STATUS_COMPLETED],
        self::STATUS_COMPLETED => [],
        self::STATUS_CANCELLED => [],
    ];

    // Status colors for UI
    const STATUS_COLORS = [
        self::STATUS_PENDING => 'yellow',
        self::STATUS_PROCESSING => 'blue',
        self::STATUS_SHIPPING => 'purple',
        self::STATUS_COMPLETED => 'green',
        self::STATUS_CANCELLED => 'red',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(Order_items::class, 'orders_id');
    }

    /**
     * Get available next statuses based on current status
     */
    public function getAvailableNextStatuses(): array
    {
        return self::STATUS_TRANSITIONS[$this->status] ?? [];
    }

    /**
     * Check if order can transition to given status
     */
    public function canTransitionTo(string $newStatus): bool
    {
        return in_array($newStatus, $this->getAvailableNextStatuses());
    }

    /**
     * Get status color for UI
     */
    public function getStatusColor(): string
    {
        return self::STATUS_COLORS[$this->status] ?? 'gray';
    }

    /**
     * Get formatted status for display
     */
    public function getFormattedStatusAttribute(): string
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }

    /**
     * Scope for filtering by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for filtering by date range
     */
    public function scopeByDateRange($query, $from = null, $to = null)
    {
        if ($from) {
            $query->whereDate('order_date', '>=', $from);
        }
        
        if ($to) {
            $query->whereDate('order_date', '<=', $to);
        }
        
        return $query;
    }

    /**
     * Scope for searching orders
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('orders_id', 'like', "%{$search}%")
              ->orWhereHas('user', function ($userQuery) use ($search) {
                  $userQuery->where('name', 'like', "%{$search}%")
                           ->orWhere('email', 'like', "%{$search}%");
              });
        });
    }

    /**
     * Get all possible statuses
     */
    public static function getAllStatuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_PROCESSING,
            self::STATUS_SHIPPING,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED,
        ];
    }
}
