<?php

namespace App\Pages\Frontend\Auth\Services;



use App\Models\user\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Modules\Frontend\Wishlist\Services\WishlistPageService;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\ProductDetail\Services\ProductDetailPageService;
use App\Modules\Users\Repository\UserRepository;
use App\Traits\RedirectWithMessageTrait;

class SocialSignInService
{
    private $userRepostory;
    public function __construct()
    {
        $this->userRepostory = (new UserRepository());
    }

    public function signIn($user)
    {
        $userName = $user->getName() ?? $user->getNickname();


        $user = $this->isUserExists($user) ?? $this->registerNewUser($userName, $user->getEmail());

        Auth::guard('web')->login($user, true);
    }



    public function isUserExists($user)
    {
        return $this->userRepostory->isUserExists('email', $user->getEmail());
    }
    public function registerNewUser($userName, $userEmail)
    {

        $user =  $this->userRepostory->createUser([
            'name' => $userName,
            'email' => $userEmail,
            'password' => Str::random(24),
        ]);

        return $user;
    }
}
