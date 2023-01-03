<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id',
        'full_name',
        'address',
        'city',
        'phone_number',
        'street',
    ];
}