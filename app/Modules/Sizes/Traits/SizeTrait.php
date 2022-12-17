<?php

namespace App\Modules\Sizes\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait SizeTrait
{
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::upper($value),
        );
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value),
        );
    }
}