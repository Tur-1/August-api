<?php

namespace App\Pages\Frontend\Auth\Controllers;

use App\Modules\Users\Models\User;
use App\Pages\Frontend\Auth\Services\SocialSignInService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleSignInController
{
    public function redirectToGoogle(Request $request)
    {

        session()->put('redirect_intended_path', $request->get('redirect_intended_path'));

        return Socialite::driver('google')->redirect();
    }

    public function callback(SocialSignInService $socialSignInService)
    {

        $socialSignInService->signIn(Socialite::driver('google')->user());

        return redirect(config('app.frontend_url') . session('redirect_intended_path'));
    }
}
