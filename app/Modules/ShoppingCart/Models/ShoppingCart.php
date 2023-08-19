<?php

namespace App\Modules\ShoppingCart\Models;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\ShoppingCart\EloquentBuilders\ShoppingCartBuilder;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'size_id',
    ];


    public function newEloquentBuilder($query): ShoppingCartBuilder
    {
        return new ShoppingCartBuilder($query);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
