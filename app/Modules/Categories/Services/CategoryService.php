<?php

namespace App\Modules\Categories\Services;

use  App\Modules\Categories\Repository\CategoryRepository;

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
    public function getSections()
    {
        return $this->categoryRepository->getSections();
    }

    public function storeCategory($validatedRequest)
    {

        return $this->categoryRepository->save($validatedRequest);
    }
    public function storeNewSection($validatedRequest)
    {
        return $this->categoryRepository->saveSection($validatedRequest);
    }
    public function updateSection($validatedRequest, $category_id)
    {
        return $this->categoryRepository->updateSection($validatedRequest, $category_id);
    }
    public function getCategoriesBySection($section_id)
    {
        return $this->categoryRepository->getCategoriesBySection($section_id);
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