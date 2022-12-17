<?php

namespace App\Modules\Sizes\Models;

use App\Modules\Sizes\Traits\SizeTrait;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Sizes\EloquentBuilders\SizeBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    use SizeTrait;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function newEloquentBuilder($query): SizeBuilder
    {
        return new SizeBuilder($query);
    }
}