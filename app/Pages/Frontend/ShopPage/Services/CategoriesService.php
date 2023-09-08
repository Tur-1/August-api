<?php

namespace App\Pages\Frontend\ShopPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Pages\Frontend\ShopPage\Resources\ShopPageCategoryResource;

class  CategoriesService
{
    private $categoryRepository;
    private $category;
    private $allCategories;
    public function __construct(CategoryRepository  $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryByUrl($url)
    {

        $this->allCategories = collect($this->categoryRepository->getAllCategoriesHasProducts());



        $this->category =  $this->allCategories->where('url', $url)->first();

        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }

        $parentCategory =  $this->getParentCategory($this->category->parent_id);

        $children =  $this->getCategoryChildren($this->category['id']);
        $parents = $this->allCategories->whereIn('id', $this->category->parents_ids);

        $parentChildren = [];
        if ($this->isCategoryHasNoChildren($children)) {

            $parentChildren = $this->getCategoryChildren($this->category->parent_id);
        }


        return [
            'category' => $this->category,
            'children' =>    $children,
            'parentCategory' => $parentCategory,
            'parentChildren' => $parentChildren,
            'parents' =>    $parents,
            'cats' =>  $this->allCategories,
        ];
    }

    private function getCategoryChildren($category_id)
    {
        return  $this->allCategories->where("parent_id", $category_id);
    }
    private function getSubcategories($parent_ids)
    {
        return  $this->allCategories->whereIn("parent_ids", $parent_ids);
    }
    private function getParentCategory($parent_id)
    {
        return  $this->allCategories->where("id", $parent_id)->first();
    }

    private function isCategoryHasNoChildren($children)
    {
        return  empty($children->toArray());
    }
}
