<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping_cart extends Model
{
    //
    protected $table = 'shopping_carts';
    protected $primaryKey = 'cart_id'; // Assuming you have a primary key for
    protected $fillable = ['user_id', 'products_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

}
