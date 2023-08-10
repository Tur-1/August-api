<?php

namespace App\Modules\Wishlist\Models;

use App\Modules\Wishlist\EloquentBuilders\WishlistBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public $timestamps = false;

    public function newEloquentBuilder($query): WishlistBuilder
    {
        return new WishlistBuilder($query);
    }
}
