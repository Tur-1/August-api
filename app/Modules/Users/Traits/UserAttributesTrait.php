<?php

namespace App\Modules\Users\Traits;



use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Support\Facades\Hash;

trait UserAttributesTrait
{
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Hash::needsRehash($value) ? Hash::make($value) : $value,
        );
    }
}
