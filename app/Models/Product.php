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
    protected $fillable = ['categories_id', 'product_name', 'description', 'product_price', 'stock_quantity', 'image_path', 'specifications','slug', 'status'];
    protected $casts = [
    'specifications' => 'array',
    'status' => 'boolean',
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

    public function getImageUrlAttribute(): string
    {
        $path = (string) ($this->image_path ?? '');

        // nếu là đường dẫn tuyệt đối (http/https) -> dùng luôn
        if ($path !== '' && filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // bỏ public/ nếu lỡ lưu kèm
        $path = preg_replace('#^public/#', '', $path);

        // nếu có đường dẫn tương đối -> trỏ qua storage symlink
        if ($path !== '') {
            return asset('storage/' . ltrim($path, '/'));
        }

        // fallback
        return asset('images/placeholder.png');
    }
}
