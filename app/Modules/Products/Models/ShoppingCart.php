<?php

namespace App\Modules\Products\Models;

use App\Modules\ShoppingCart\EloquentBuilders\ShoppingCartBuilder;
use App\Modules\ShoppingCart\Traits\ShoppingCartTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    use ShoppingCartTrait;

    protected $fillable = [];

    public function newEloquentBuilder($query): ShoppingCartBuilder
    {
        return new ShoppingCartBuilder($query);
    }
}