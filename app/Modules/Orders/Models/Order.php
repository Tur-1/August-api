<?php

namespace App\Modules\Orders\Models;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Orders\Traits\OrderTrait;
use App\Modules\Orders\Models\OrderCoupon;
use App\Modules\Orders\Models\OrderAddress;
use App\Modules\Orders\EloquentBuilders\OrderBuilder;
use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use OrderTrait;

    protected $fillable = [
        'status',
        'user_id',
        'shipping_fees',
        'subTotal',
        'total',
    ];

    public function newEloquentBuilder($query): OrderBuilder
    {
        return new OrderBuilder($query);
    }

    public function address()
    {
        return $this->hasOne(OrderAddress::class, 'order_id');
    }
    public function coupon()
    {
        return $this->hasOne(OrderCoupon::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}