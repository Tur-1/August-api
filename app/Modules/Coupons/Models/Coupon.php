<?php

namespace App\Modules\Coupons\Models;

use App\Modules\Coupons\EloquentBuilders\CouponBuilder;
use App\Modules\Coupons\Traits\CouponTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    use CouponTrait;

    protected $fillable = [
        'code',
        'type',
        'amount',
        'starts_at',
        'expires_at',
        'minimum_purchases',
        'use_times',
        'used_times',
        'is_active'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function newEloquentBuilder($query): CouponBuilder
    {
        return new CouponBuilder($query);
    }
}