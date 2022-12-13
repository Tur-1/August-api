<?php

namespace App\Modules\Categories\Models;

use App\Modules\Categories\EloquentBuilders\CategoryBuilder;
use App\Modules\Categories\Traits\CategoryTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, CategoryTrait;


    protected $appends = ['image_url'];
    protected $casts = [
        'parents_ids' => 'array',
        'is_section' => 'boolean',
        'is_active' => 'boolean'

    ];

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }



    public function section()
    {
        return  $this->belongsTo(Category::class, 'section_id')->select('id', 'name');
    }
}