<?php

namespace App\Pages\Frontend\Auth\Services;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Modules\Users\Repository\UserRepository;

class AuthService
{

    private $userRepository;
    public function register($validatedRequest)
    {
        $this->userRepository = new UserRepository();
        return $this->userRepository->register($validatedRequest);
    }

    public function sendWelcomeEmail($user)
    {
        Mail::to($user->email)->send(new WelcomeMail($user->name));
    }
}
