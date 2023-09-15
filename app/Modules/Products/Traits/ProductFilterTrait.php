<?php

namespace App\Modules\Products\Traits;


trait ProductFilterTrait
{
    public function filterByBrands($query)
    {
        return  $query->whereHas('brand', function ($query) {
            if (is_array(request()->input('brand'))) {
                $query->whereIn('slug', request()->input('brand'))->select('id', 'slug');
            } else {
                $query->where('slug', request()->input('brand'))->select('id', 'slug');
            }
        });
    }
    public function filterByColors($query)
    {
        return $query->whereHas('color', function ($query) {
            if (is_array(request()->input('color'))) {
                $query->whereIn('slug', request()->input('color'))->select('id', 'slug');
            } else {
                $query->where('slug', request()->input('color'))->select('id', 'slug');
            }
        });
    }
    public function filterBySizeOptions($query)
    {

        return  $query->whereHas('sizes', function ($query) {
            if (is_array(request()->input('size'))) {
                $query->whereIn('slug', request()->input('size'));
            } else {
                $query->where('slug', request()->input('size'));
            }
        });
    }

    public function filterByStatus($query)
    {
        return $query->when(request()->input('status') == 'Active', fn ($query) => $query->Active())
            ->when(request()->input('status') == 'inactive', fn ($query) => $query->InActive());
    }

    public function filterBySorting($query)
    {
        return $query->when(request('sort') == 'new', fn ($query) => $query->latest())
            ->when(request('sort') == 'price-low-to-high', fn ($query) => $query->orderBy('price', 'Asc'))
            ->when(request('sort') == 'price-high-to-low', fn ($query) => $query->orderByDesc('price'));
    }
}
