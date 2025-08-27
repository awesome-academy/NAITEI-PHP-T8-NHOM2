<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
     use HasFactory;

    protected $table = 'product_images';
    protected $primaryKey = 'product_image_id';
    protected $fillable = ['products_id', 'image_path', 'is_primary', 'sort_order'];
    protected $casts = [
        'is_primary' => 'boolean',
    ];
    protected $appends = ['url'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function getUrlAttribute(): string
    {
        $p = (string)($this->image_path ?? '');

        if ($p !== '' && filter_var($p, FILTER_VALIDATE_URL)) {
            return $p;
        }

        $p = preg_replace('#^public/#', '', $p);

        return $p !== ''
            ? asset('storage/' . ltrim($p, '/'))
            : asset('images/placeholder.png');
    }
}
