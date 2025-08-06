<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'products_id'; // Assuming you have a primary key for products
    protected $fillable = ['categories_id', 'product_name', 'description', 'product_price', 'stock_quantity', 'image_path', 'specifications'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'products_id');
    }

    public function orderItems()
    {
        return $this->hasMany(Order_items::class, 'products_id');
    }

    public function shoppingCarts()
    {
        return $this->hasMany(Shopping_cart::class, 'products_id');
    }

}
