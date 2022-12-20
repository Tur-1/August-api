<?php

namespace App\Modules\Products\Models;

use App\Modules\Products\EloquentBuilders\ProductBuilder;
use App\Modules\Products\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;
    use ProductTrait;

    protected $fillable = [];
    
    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }

}