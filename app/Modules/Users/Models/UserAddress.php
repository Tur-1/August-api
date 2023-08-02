<?php

namespace App\Modules\Users\Models;

use App\Modules\Addresses\EloquentBuilders\AddressBuilder;
use App\Modules\Addresses\Traits\AddressTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    use AddressTrait;

    protected $fillable = [
        'user_id',
        'full_name',
        'city',
        'street',
        'phone_number',
        'address',
    ];
}