<?php

namespace App\Pages\Frontend\Auth\Controllers;

use App\Pages\Frontend\Auth\Services\SocialSignInService;
use Illuminate\Http\Request;
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

        $intended_path = session('redirect_intended_path');
        $socialSignInService->signIn(Socialite::driver('google')->user());

        session()->remove('redirect_intended_path');
        return redirect(config('app.frontend_url') . $intended_path);
    }
}
