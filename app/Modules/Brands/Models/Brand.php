<?php

namespace App\Modules\Brands\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Brands\Traits\BrandTrait;
use App\Modules\Brands\EloquentBuilders\BrandBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    use BrandTrait;

    protected $appends = ['image_url'];

    public function newEloquentBuilder($query): BrandBuilder
    {
        return new BrandBuilder($query);
    }

    public function products()
    {
        return $this->hasMany(Product::class)->select('id', 'brand_id');
    }
}