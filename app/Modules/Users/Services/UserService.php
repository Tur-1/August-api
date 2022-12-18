<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Repository\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers($request)
    {
        return $this->userRepository->getAllUsers($request);
    }

    public function createUser($validatedRequest)
    {
        return $this->userRepository->createUser($validatedRequest);
    }

    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
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