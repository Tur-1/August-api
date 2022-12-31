<?php

namespace App\Modules\Colors\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Colors\Traits\ColorTrait;
use App\Modules\Colors\EloquentBuilders\ColorBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    use ColorTrait;

    protected $appends = ['image_url'];

    public function newEloquentBuilder($query): ColorBuilder
    {
        return new ColorBuilder($query);
    }


    public function products()
    {
        return $this->hasMany(Product::class)->select('id', 'color_id');
    }
}