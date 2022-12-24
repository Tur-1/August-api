<?php

namespace App\Modules\Products\Traits;

use Illuminate\Support\Str;
use App\Modules\Sizes\Models\Size;
use Illuminate\Support\Facades\Storage;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\ProductImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ProductTrait
{
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')->withPivot(['id', 'stock']);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}