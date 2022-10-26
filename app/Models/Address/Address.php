<?php

namespace App\Models\Address;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'city',
        'street',
        'phone_number',
        'address'
    ];


    protected function fullName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::title($value),
        );
    }
}