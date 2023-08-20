<?php

namespace App\Pages\Admin\UsersPage\Services;

use App\Modules\Users\Repository\UserRepository;
use App\Pages\Admin\UsersPage\Resources\UserResource;
use App\Pages\Admin\UsersPage\Resources\UsersListResource;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers($request)
    {
        return UsersListResource::collection($this->userRepository->getAllUsers($request));
    }

    public function createUser($validatedRequest)
    {
        return $this->userRepository->createUser($validatedRequest);
    }

    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
    }
    public function getUserWithPermissionsIds($id)
    {
        return UserResource::make($this->userRepository->getUserWithPermissionsIds($id));
    }


    public function updateUser($validatedRequest, $id)
    {
        return UserResource::make($this->userRepository->updateUser($validatedRequest, $id));
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
