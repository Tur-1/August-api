<?php

namespace App\Modules\Addresses\Models;

use App\Modules\Addresses\EloquentBuilders\AddressBuilder;
use App\Modules\Addresses\Traits\AddressTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
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

    public function newEloquentBuilder($query): AddressBuilder
    {
        return new AddressBuilder($query);
    }
}