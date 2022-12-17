<?php

namespace App\Modules\Categories\Services;

use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Categories\Resources\CategoriesResource;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories($records)
    {
        return CategoriesResource::collection($this->categoryRepository->getAllCategories($records));
    }

    public function getSections()
    {
        return $this->categoryRepository->getSections();
    }

    public function storeCategory($validatedRequest)
    {
        return $this->categoryRepository->saveCategory($validatedRequest);
    }

    public function storeNewSection($validatedRequest)
    {
        return $this->categoryRepository->saveSection($validatedRequest);
    }

    public function updateSection($validatedRequest, $category_id)
    {
        $category = $this->categoryRepository->getCategory($category_id);

        $this->categoryRepository->saveSection($validatedRequest, $category);

        return CategoriesResource::make($category);
    }

    public function getCategoriesBySection($section_id)
    {
        return $this->categoryRepository->getCategoriesBySection($section_id);
    }

    public function getCategory($category_id)
    {
        return CategoriesResource::make($this->categoryRepository->getCategory($category_id));
    }

    public function updateCategory($validatedRequest, $category_id)
    {
        $category = $this->categoryRepository->getCategory($category_id);

        $this->categoryRepository->saveCategory($validatedRequest, $category);

        return CategoriesResource::make($category);
    }

    public function destroyCategory($category_id)
    {
        return $this->categoryRepository->destroyCategory($category_id);
    }
}