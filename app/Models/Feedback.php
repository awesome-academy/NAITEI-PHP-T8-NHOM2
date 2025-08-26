<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    //
    use HasFactory;
    protected $primaryKey = 'feedback_id';
    protected $fillable = ['user_id', 'products_id', 'comment', 'rating','is_hidden','verified_purchase', 'created_at', 'updated_at'];
    protected $table = 'feedback';
    protected $casts = [
        'is_hidden' => 'boolean',
        'verified_purchase' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'products_id', 'products_id')->withTrashed();
    }

    public function getRouteKeyName(): string
    {
        return $this->primaryKey; // 'feedback_id'
    }
    
    // Scope filter feedback
     public function scopeVisible($query)
    {
        return $query->where('is_hidden', false);
    }

    public function scopeByRating($query, ?int $rating)
    {
        if ($rating) {
            $query->where('rating', $rating);
        }
        return $query;
    }
}
