<?php

namespace App\Modules\Reviews\Models;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Reviews\Traits\ReviewTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Reviews\EloquentBuilders\ReviewBuilder;

class Review extends Model
{
    use HasFactory;
    use ReviewTrait;

    protected $fillable =
    [
        'user_id',
        'product_id',
        'comment',
        'review_id',
        'is_read'
    ];
    protected $casts = [
        'is_read' => 'boolean',
    ];
    public function newEloquentBuilder($query): ReviewBuilder
    {
        return new ReviewBuilder($query);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('name', 'id', 'gender');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)
            ->select('id', 'name', 'slug')
            ->withMainProductImage();
    }

    public function reply()
    {
        return $this->hasOne(Review::class, 'review_id')->with('user');
    }
}