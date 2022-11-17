<?php

namespace App\Pages\Backend\Categories\Services;

use App\Models\Category\Repository\CategoryRepository;
use App\Models\User\Repository\UserRepository;

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
    public function createUser($validatedRequest)
    {
        return $this->userRepository->createUser($validatedRequest);
    }
    public function findUser($id)
    {
        return $this->userRepository->findUser($id);
    }
    public function updateUser($validatedRequest, $id)
    {
        return $this->userRepository->updateUser($validatedRequest, $id);
    }
    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}