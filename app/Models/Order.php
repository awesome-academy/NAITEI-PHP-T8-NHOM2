<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'orders_id'; //
    protected $fillable = ['user_id', 'total_amount', 'status', 'shipping_address', 'payment_method', 'order_date', 'delivery_date'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(Order_items::class, 'orders_id');
    }
}
