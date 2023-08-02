<?php

namespace App\Pages\Admin\CategoriesPage\Services;

use App\Modules\Categories\Repository\CategoryRepository;
use App\Pages\Admin\CategoriesPage\Resources\CategoriesListResource;
use App\Pages\Admin\CategoriesPage\Resources\CategoriesResource;
use App\Pages\Admin\CategoriesPage\Resources\CategoryShowResource;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories($section_id, $searchQuery)
    {

        return CategoriesListResource::collection(
            $this->categoryRepository->getAllCategories($section_id, $searchQuery)
        );
    }


    public function getAllCategoriesBySection($section_id)
    {
        return CategoryShowResource::collection(
            $this->categoryRepository->getAllCategoriesBySection($section_id)
        );
    }


    public function storeCategory($request)
    {
        return $this->categoryRepository->save(request: $request);
    }


    public function getCategory($category_id)
    {
        return CategoriesResource::make(
            $this->categoryRepository->find($category_id)
        );
    }

    public function updateCategory($request, $category_id)
    {
        return CategoriesResource::make(
            $this->categoryRepository->update($request, $category_id)
        );
    }

    public function destroyCategory($category_id)
    {
        return $this->categoryRepository->destroy($category_id);
    }
}
