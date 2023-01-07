<?php

namespace App\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Categories\Traits\CategoryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Categories\EloquentBuilders\CategoryBuilder;

class Category extends Model
{
    use HasFactory;
    use CategoryTrait;

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
        return $this->belongsTo(Category::class, 'section_id')->select('id', 'name');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories',  'category_id', 'product_id');
    }
}