<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'product_id',
        'image',
        'is_main_image'
    ];
}