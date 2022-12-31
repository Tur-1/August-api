<?php

namespace App\Modules\Colors\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;

class ColorBuilder extends Builder
{
    public function countProducts($category_id): self
    {
        return $this->withCount(['products' => fn ($query) => $query->whereCategory($category_id)]);
    }

    public function hasProducts($category_id): self
    {
        return $this->whereHas('products', fn ($query) => $query->whereCategory($category_id));
    }

    public function whereHasProductsWithCount($category_id)
    {
        return $this->HasProducts($category_id)->countProducts($category_id);
    }
}