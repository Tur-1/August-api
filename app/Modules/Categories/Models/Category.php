<?php

namespace App\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Categories\Traits\CategoryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Categories\EloquentBuilders\CategoryBuilder;
use App\Modules\Categories\Traits\CategoryAttributesTrait;

class Category extends Model
{
    use HasFactory;
    use CategoryTrait;
    use CategoryAttributesTrait;

    protected $fillable = [
        'name',
        'slug',
        'url',
        'image',
        'parents_ids',
        'is_section',
        'is_active',
        'parent_id',
        'section_id',
    ];
    protected $appends = ['image_url'];
    protected $casts = [
        'parents_ids' => 'array',
        'is_section' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }

    public function section()
    {
        return $this->belongsTo(Category::class, 'section_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories',  'category_id', 'product_id');
    }
}
