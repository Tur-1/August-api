<?php

namespace App\Modules\Categories\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Modules\Categories\Models\Category;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryTrait
{
    public static function hasProducts()
    {

        $allCategories =  Category::query()
            ->whereHas('products', fn ($product) => $product->select('product_id'))
            ->get();

        $sections =  $allCategories->where('is_section', true);

        self::formatTree($sections, $allCategories);
        return $allCategories;
    }
    public static function tree()
    {

        $allCategories =  Category::get();

        $sections =  $allCategories->where('is_section', 1);

        self::formatTree($sections, $allCategories);
        return $allCategories;
    }
    public static function formatTree($sections, $allCategories)
    {
        foreach ($sections as $key => $section) {

            $section['children'] =  $allCategories->where('parent_id', $section['id'])->values();

            if (!empty($section['children'])) {
                self::formatTree($section['children'], $allCategories);
            }
        }
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/categories/' . $this->image) : null,
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Str::title($value),
        );
    }
}