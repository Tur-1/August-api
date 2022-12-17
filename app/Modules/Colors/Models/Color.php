<?php

namespace App\Modules\Colors\Models;

use App\Modules\Colors\EloquentBuilders\ColorBuilder;
use App\Modules\Colors\Traits\ColorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    use ColorTrait;

    protected $appends = ['image_url'];

    public function newEloquentBuilder($query): ColorBuilder
    {
        return new ColorBuilder($query);
    }
}