<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'product_name',
        'product_slug',
        'product_attributes',
        'product_image',
        'product_quantity',
        'product_price',
        'total_price',
    ];

    protected $casts = [
        'product_attributes' => 'array',

    ];
    protected function productImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?
                config('app.url') .  Storage::url("images/orders/order-$this->order_id/" . $value)
                : null,
        );
    }
}
