<?php

namespace App\Modules\Brands\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait BrandTrait
{

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/brands/' . $this->image) : null,
        );
    }
}