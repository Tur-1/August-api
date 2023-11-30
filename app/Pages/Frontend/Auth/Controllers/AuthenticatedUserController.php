<?php

namespace App\Pages\Frontend\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Pages\Frontend\Auth\Services\AuthService;
use App\Pages\Frontend\Auth\Requests\LoginRequest;
use App\Pages\Frontend\Auth\Requests\RegisterRequest;
use App\Pages\Frontend\Auth\Resources\AuthUserResource;
use App\Pages\Frontend\Auth\Services\SocialSignInService;

class AuthenticatedUserController extends Controller
{
    public function register(RegisterRequest $request, AuthService $authService)
    {

        $request->validated();

        $user = $authService->register($request);

        Auth::guard('web')->login($user, true);

        $authService->sendWelcomeEmail($user);

        return response()->success([
            'user' => AuthUserResource::make($user),
        ]);
    }

    public function login(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        $user =  $request->user('web');

        return response()->success([
            'user' => AuthUserResource::make($user),
            'message' => "You have successfully logged in!"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->success(['message' => "You have successfully logged out!"]);
    }

    public function signInByGithub()
    {
        $url = Socialite::driver('github')->redirect()->getTargetUrl();

        return response()->json($url);
    }

    public function githubRedirect(SocialSignInService $socialSignInService)
    {
        $githubUser = Socialite::driver('github')->user();


        $socialSignInService->signIn($githubUser);

        return response()->success([
            'user' => $githubUser,
            'message' => "You have successfully logged in!"
        ]);
    }
}
