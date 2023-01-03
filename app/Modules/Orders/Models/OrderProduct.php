<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'product_name',
        'product_slug',
        'product_brand',
        'product_image',
        'product_size',
        'product_quantity',
        'product_price',
        'total_price',
    ];
}