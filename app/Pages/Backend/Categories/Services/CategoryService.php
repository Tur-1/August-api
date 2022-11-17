<?php

namespace App\Pages\Backend\Categories\Services;

use App\Models\Category\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategories($records)
    {
        return $this->categoryRepository->getAllCategories($records);
    }
    public function storeCategory($validatedRequest)
    {
        return $this->categoryRepository->store($validatedRequest);
    }
    public function getCategory($category_id)
    {
        return $this->categoryRepository->find($category_id);
    }
    public function updateCategory($validatedRequest, $category_id)
    {
        return $this->categoryRepository->update($validatedRequest, $category_id);
    }
    public function destroyCategory($category_id)
    {
        return $this->categoryRepository->destroy($category_id);
    }
}