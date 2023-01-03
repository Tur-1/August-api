<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'code',
        'type',
        'amount',
        'discounted_amount'
    ];
}