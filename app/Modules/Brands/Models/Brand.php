<?php

namespace App\Modules\Brands\Models;

use App\Modules\Brands\EloquentBuilders\BrandBuilder;
use App\Modules\Brands\Traits\BrandTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Brand extends Model
{
    use HasFactory;
    use BrandTrait;

    protected $appends = ['image_url'];

    public function newEloquentBuilder($query): BrandBuilder
    {
        return new BrandBuilder($query);
    }

}