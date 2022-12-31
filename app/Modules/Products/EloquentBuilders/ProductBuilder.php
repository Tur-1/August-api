<?php

namespace App\Modules\Products\EloquentBuilders;

use App\Modules\Brands\Models\Brand;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\Products\Models\ProductImage;

class ProductBuilder extends Builder
{
    public function withMainProductImage(): self
    {
        return $this->addSelect([
            'main_image' => ProductImage::select('image')
                ->whereColumn('product_id', 'products.id')
                ->where('is_main_image', true)
                ->limit(1),
        ]);
    }

    public function whereCategory($category_id): self
    {
        return $this->whereHas('categories', function ($query) use ($category_id) {
            return $query->where('categories.id', $category_id)->select('categories.id');
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
}