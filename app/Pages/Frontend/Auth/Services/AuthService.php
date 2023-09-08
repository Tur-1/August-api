<?php

namespace App\Pages\Frontend\Auth\Services;

use App\Modules\Users\Repository\UserRepository;

class AuthService
{

    private $userRepository;
    public function createUser($validatedRequest)
    {
        $this->userRepository = new UserRepository();
        return $this->userRepository->createUser($validatedRequest);
    }
}
