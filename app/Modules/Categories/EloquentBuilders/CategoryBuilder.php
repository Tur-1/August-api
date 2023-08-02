<?php

namespace App\Modules\Categories\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    public function sections(): self
    {
        return $this->where('is_section', true);
    }

    public function withSection(): self
    {
        return $this->with('section:id,name,section_id');
    }
    public function selectCategoriesPageFields(): self
    {
        return $this->select('id', 'name', 'slug', 'url', 'image', 'is_section', 'parent_id');
    }

    public function hasProducts()
    {
        return $this->whereHas(
            'products',
            fn ($product) => $product->select('product_id')
        );
    }

    public function orderBySection(): self
    {
        return $this->orderBy('is_section', 'desc');
    }
    public function WhenSortBySection($sectionId): self
    {
        return $this->when($sectionId, function ($query) use ($sectionId) {
            $query->where('section_id', $sectionId);
        });
    }
    public function WhenSearchByName($value): self
    {
        return $this->when($value, function ($query) use ($value) {
            $query->where('name', 'like', '%' . $value . '%');
        });
    }

    public function whereSection($section_id): self
    {
        return $this->where([
            'is_section' => true,
            'id' => $section_id,
        ]);
    }
}
