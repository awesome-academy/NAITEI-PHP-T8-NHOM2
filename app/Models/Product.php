<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'products_id'; // Assuming you have a primary key for products
    protected $fillable = ['categories_id', 'product_name', 'description', 'product_price', 'stock_quantity', 'image_path', 'specifications', 'slug', 'status', 'rating_count', 'rating_avg'];
    protected $casts = [
        'specifications' => 'array',
        'status' => 'boolean',
        'rating_avg' => 'decimal:2',
    ];

    protected $appends = ['image_url'];

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

    public function images(): HasMany
    {
        return $this->hasMany(\App\Models\ProductImage::class, 'products_id')
                    ->orderBy('sort_order')->orderBy('product_image_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(\App\Models\ProductImage::class, 'products_id')
                    ->where('is_primary', true)->orderByDesc('product_image_id');
    }

    // Query Scopes

    // Sản phẩm đang hiển thị cho người dùng
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Tìm theo tên (để dùng ở search cơ bản)
    public function scopeNameLike($query, string $keyword)
    {
        return $query->where('product_name', 'like', "%{$keyword}%");
    }

    // Ưu tiên ảnh chính nếu có, fallback ảnh cũ (giữ API image_url cũ không gãy UI)
    public function getImageUrlAttribute(): string
    {
        $primary = $this->relationLoaded('images')
            ? ($this->images->firstWhere('is_primary', true) ?? $this->images->first())
            : ($this->primaryImage()->first() ?? $this->images()->first());

        if ($primary) {
        $u = (string) $primary->url;           // sẽ gọi accessor ở ProductImage
        if ($u !== '') return $u;
        }

        $path = (string) ($this->image_path ?? '');
        if ($path !== '' && filter_var($path, FILTER_VALIDATE_URL)) return $path;
        $path = preg_replace('#^public/#', '', $path);
        return $path !== '' ? asset('storage/'.ltrim($path,'/')) : asset('images/placeholder.png');
    }
}
