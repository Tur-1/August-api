<?php

namespace App\Modules\Products\Traits;


use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductAttributesTrait
{

    // private $productImagePath = '/products/product_' . $this->id . '/';

    protected function mainImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->main_image ?
                config('app.url') .  Storage::url('images/products/product_' . $this->id . '/' . $this->main_image)
                : null,
        );
    }
    protected function mainImageFullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->main_image ? 'products/product_' . $this->id . '/' . $this->main_image
                : null,
        );
    }

    protected function brandImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>
            config('app.url') .  Storage::url('images/brands/' . $value),
        );
    }
}
