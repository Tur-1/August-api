<?php

namespace App\Pages\Backend\Users\Services;

use App\Models\User\Repository\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAllUsers($records)
    {
        return $this->userRepository->getAllUsers($records);
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