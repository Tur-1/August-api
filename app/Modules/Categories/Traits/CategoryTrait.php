<?php

namespace App\Modules\Categories\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Modules\Categories\Models\Category;


trait CategoryTrait
{
    public static function sectionsWithCategories()
    {

        $allCategories =  Category::query()
            ->hasProducts()
            ->selectCategoriesPageFields()
            ->get();


        $sections =  $allCategories->where('is_section', true);

        self::formatTree($sections, $allCategories);
        return $allCategories->where('is_section', true);
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
}
