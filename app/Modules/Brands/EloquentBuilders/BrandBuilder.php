<?php

namespace App\Modules\Brands\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;


class BrandBuilder extends Builder
{
    public function countProducts($category_id): self
    {
        return $this->withCount(['products' => fn ($query) => $query->whereHasCategory($category_id)]);
    }

    public function hasProducts($category_id): self
    {
        return $this->whereHas('products', fn ($query) => $query->whereHasCategory($category_id));
    }

    public function whereHasProductsWithCount($category_id)
    {
        return $this->HasProducts($category_id)->countProducts($category_id);
    }
}
