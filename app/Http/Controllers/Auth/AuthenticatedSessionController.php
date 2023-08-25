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

        $user =  $request->user('admin')->load(['permissions']);
        $access_token =  $request->user('admin')->createToken('access-token')->plainTextToken;
        $permissions =   $user->permissions->pluck('slug')->toArray();


        return response()->success([
            'user' => $user,
            'access_token' => $access_token,
            'token_type' => 'Bearer',
            'permissions' =>  $permissions,
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
