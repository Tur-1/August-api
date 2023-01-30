<?php

namespace App\Modules\Banners\Models;

use App\Modules\Banners\EloquentBuilders\BannerBuilder;
use App\Modules\Banners\Traits\BannerTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    use BannerTrait;

    protected $fillable = ['is_active'];

    protected $casts = [
        'is_active' => 'boolean',

    ];
    public function newEloquentBuilder($query): BannerBuilder
    {
        return new BannerBuilder($query);
    }
}
