<?php

namespace App\Modules\Products\Traits;

use App\Modules\Sizes\Models\Size;
use App\Modules\Brands\Models\Brand;
use App\Modules\Colors\Models\Color;
use App\Modules\Reviews\Models\Review;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\ProductSize;
use App\Modules\Products\Models\ProductImage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ProductRelationshipsTrait
{
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')->withPivot(['id', 'stock']);
    }

    public function stockSizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')
            ->wherePivot('stock', '!=', 0)
            ->withPivot(['id', 'stock']);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id')->whereNull('review_id')
            ->with('user', 'reply')
            ->select('id', 'comment', 'user_id', 'product_id', 'created_at', 'review_id')
            ->latest();
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
