<?php

namespace App\Modules\Products\EloquentBuilders;

use App\Modules\Brands\Models\Brand;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\Products\Models\ProductImage;
use App\Modules\Products\Traits\ProductFilterTrait;

class ProductBuilder extends Builder
{
    use ProductFilterTrait;

    public function withMainProductImage(): self
    {
        return $this->addSelect([
            'main_image' => ProductImage::select('image')
                ->whereColumn('product_id', 'products.id')
                ->where('is_main_image', true)
                ->limit(1),
        ]);
    }

    public function whereHasCategory(string $category_url): self
    {
        return $this->whereHas('categories', function ($query) use ($category_url) {
            return $query->where('categories.url', $category_url)->select('categories.url');
        });
    }
    public function withBrandImage()
    {
        return $this->addSelect([
            'brand_image' => Brand::select('image')->whereColumn('id', 'products.brand_id'),
        ]);
    }
    public function withBrandName()
    {
        return $this->addSelect([
            'brand_name' => Brand::select('name')->whereColumn('id', 'products.brand_id'),
        ]);
    }
    public function active(): self
    {
        return $this->where('is_active', true);
    }
    public function withFilters()
    {

        return $this->when(request()->has('brand'), fn ($query) => $this->filterByBrands($query))
            ->when(request()->has('color'), fn ($query) => $this->filterByColors($query))
            ->when(request()->has('size'), fn ($query) => $this->filterBySizeOptions($query))
            ->when(request()->has('sort'), fn ($query) => $this->filterBySorting($query))
            ->when(request()->has('status'), fn ($query) => $this->filterByStatus($query));
    }
    public function withRelatedProducts($productId, $category_ids): self
    {
        return $this->whereHas('categories', function ($query) use ($category_ids) {
            $query->whereIn('id', $category_ids);
        })->withMainProductImage()
            ->withBrandName()
            ->active()
            ->inRandomOrder()
            ->limit(20);
    }
}
