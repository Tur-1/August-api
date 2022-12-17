<?php

namespace App\Modules\Colors\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ColorTrait
{
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url').Storage::url('images/colors/'.$this->image) : null,
        );
    }
}