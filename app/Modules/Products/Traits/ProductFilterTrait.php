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
        if (request()->input('status') == 'Active') {
            return $query->Active();
        }
        if (request()->input('status') == 'inactive') {
            return $query->InActive();
        }
    }

    public function filterBySorting($query)
    {
        if (request()->input('sort') == 'new') {
            return $query->latest();
        }
        if (request()->input('sort') == 'price-low-to-high') {
            return  $query->orderBy('price', 'Asc');
        }
        if (request()->input('sort') == 'price-high-to-low') {
            return  $query->orderByDesc('price');
        }
    }
}
