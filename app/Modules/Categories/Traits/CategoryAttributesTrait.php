<?php

namespace App\Modules\Categories\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Modules\Categories\Models\Category;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryAttributesTrait
{


    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/categories/' . $this->image) : null,
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Str::title($value),
        );
    }
}
