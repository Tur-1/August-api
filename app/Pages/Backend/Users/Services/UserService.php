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
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
    public function createUser($validatedRequest)
    {
        return $this->userRepository->createUser($validatedRequest);
    }
    public function getUser($id)
    {
        return $this->userRepository->findUserById($id);
    }
}