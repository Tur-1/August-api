<?php

namespace App\Models\Category\Repository;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{

    public function geSectionsWithCategories()
    {
        return Category::tree()->where("is_section", true);
    }
    public function getAllCategories()
    {
        return Category::tree();
    }
}