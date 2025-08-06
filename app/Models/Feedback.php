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
    protected $fillable = ['user_id', 'products_id', 'comment', 'rating'];
    protected $table = 'feedback';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'products_id', 'products_id');
    }
}
