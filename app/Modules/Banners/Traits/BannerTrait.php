<?php

namespace App\Modules\Banners\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Modules\Banners\Models\Banner;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait BannerTrait
{
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/banners/' . $this->image) : null,
        );
    }
}