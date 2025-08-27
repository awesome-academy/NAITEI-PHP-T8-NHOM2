<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    //
    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id'; // Assuming you have a primary key for
    protected $fillable = ['orders_id', 'products_id', 'quantity', 'price', 'sub_total'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id')->withTrashed();
    }
}
