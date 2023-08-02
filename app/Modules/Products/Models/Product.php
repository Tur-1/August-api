<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Products\EloquentBuilders\ProductBuilder;
use App\Modules\Products\Traits\ProductAttributesTrait;
use App\Modules\Products\Traits\ProductRelationshipsTrait;

class Product extends Model
{
    use HasFactory;
    use ProductRelationshipsTrait;
    use ProductAttributesTrait;

    protected $guarded  = [];


    protected $appends = ['main_image_url'];


    protected $casts = [
        'is_active' => 'boolean',

    ];

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }
}
