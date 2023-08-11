<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use App\Pages\Frontend\WishlistPage\Services\WishlistPageService;
use App\Pages\Frontend\ProductDetailPage\Services\ProductDetailPageService;

class AuthenticatedSessionController extends Controller
{

    public function isAuthenticated()
    {
        $isAuth = false;

        if (auth()->check()) $isAuth = true;

        return response()->success([
            'isAuthenticated' => $isAuth,
        ]);
    }

    public function getAuthUser()
    {

        $user = auth()->user()->load('permissions');
        $permissions = $user->permissions->pluck('slug')->toArray();

        return response()->json([
            'user' => $user,
            'permissions' =>  $permissions,
        ]);
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->user()->load(['permissions']);
        $access_token =  $request->user()->createToken('access-token')->plainTextToken;
        $permissions =  $request->user()->permissions->pluck('slug')->toArray();

        $message = null;
        $redirect_to = null;


        return response()->success([
            'user' => $request->user(),
            'access_token' => $access_token,
            'isAuthenticated' => true,
            'token_type' => 'Bearer',
            'permissions' =>  $permissions,
            'message' => $message,
            'redirect_to' => $redirect_to,
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->success(['message' => "You have successfully logged out!"]);
    }
}
