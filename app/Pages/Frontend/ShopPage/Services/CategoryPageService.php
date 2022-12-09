<?php

namespace App\Pages\Frontend\ShopPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Models\Category\Repository\CategoryRepository;
use App\Pages\Frontend\ShopPage\Resources\CategoriesResource;

class  CategoryPageService
{
    private $allCategories;
    private $category;


    public function getCategory($slug)
    {
        $categoryRepository = new CategoryRepository();

        $this->allCategories = $categoryRepository->getAllCategories();


        $this->category = $this->allCategories->where("slug", $slug)->first();

        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }

        if (empty($this->category->children->toArray())) {

            $this->category =  $this->allCategories->where("id", $this->category['parent_id'])->first();
        }


        return CategoriesResource::make($this->category)->resolve();
    }
}
