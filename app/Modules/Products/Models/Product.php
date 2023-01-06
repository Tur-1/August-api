<?php

namespace App\Modules\Products\Models;

use App\Modules\Sizes\Models\Size;
use App\Modules\Brands\Models\Brand;
use App\Modules\Colors\Models\Color;
use App\Modules\Reviews\Models\Review;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\ProductImage;
use App\Modules\Products\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Products\EloquentBuilders\ProductBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use ProductTrait;

    protected $guarded  = [];


    protected $appends = ['main_image_url'];


    protected $casts = [
        'is_active' => 'boolean',

    ];

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }

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