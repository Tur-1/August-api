<?php

namespace App\Modules\Products\Traits;


use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductAttributesTrait
{


    protected function mainImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->main_image ?
                config('app.url') .  Storage::url('images/products/product_' . $this->id . '/' . $this->main_image)
                : null,
        );
    }
    protected function mainImageName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->main_image ? 'images/products/product_' . $this->id . '/' . $this->main_image
                : null,
        );
    }

    protected function brandImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>
            $value ? config('app.url') . Storage::url('images/brands/' . $value) : null,
        );
    }
}
