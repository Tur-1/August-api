<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthAdminResource;

class AuthenticatedSessionController extends Controller
{


    public function getUserPermissions(Request $request)
    {
        $permissions = [];
        if (auth('admin')->check()) {
            $user = $request->user('admin')->load('permissions');
            $permissions = $user->permissions->pluck('slug')->toArray();
        }

        return response()->json([
            'permissions' =>  $permissions,
        ]);
    }

    public function userLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user =  $request->user('web');
        $access_token =  $request->user('web')->createToken('access-token')->plainTextToken;


        return response()->success([
            'user' => AuthAdminResource::make($user),
            'access_token' => $access_token,
            'token_type' => 'Bearer',
            'message' => "You have successfully logged in!"
        ]);
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->success(['message' => "You have successfully logged out!"]);
    }
    public function adminLogin(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user =  $request->user('admin')->load(['permissions']);
        $access_token =  $request->user('admin')->createToken('access-token')->plainTextToken;
        $permissions =   $user->permissions->pluck('slug')->toArray();


        return response()->success([
            'user' => AuthAdminResource::make($user),
            'access_token' => $access_token,
            'token_type' => 'Bearer',
            'permissions' =>  $permissions,
            'message' => "You have successfully logged in!"
        ]);
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->success(['message' => "You have successfully logged out!"]);
    }
}
