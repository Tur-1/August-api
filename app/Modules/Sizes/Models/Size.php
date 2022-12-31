<?php

namespace App\Modules\Sizes\Models;

use App\Modules\Sizes\Traits\SizeTrait;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Sizes\EloquentBuilders\SizeBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    use SizeTrait;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function newEloquentBuilder($query): SizeBuilder
    {
        return new SizeBuilder($query);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sizes', 'size_id', 'product_id')
            ->wherePivot('stock', '!=', 0)
            ->withPivot(['id', 'stock']);
    }
}