<?php

namespace App\Pages\Admin\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\Auth\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Pages\Admin\Auth\Resources\AuthAdminResource;

class AuthenticatedAdminController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user =  $request->user('admin')->load(['permissions']);
        $permissions =   $user->permissions->pluck('slug')->toArray();

        return response()->success([
            'user' => AuthAdminResource::make($user),
            'permissions' =>  $permissions,
            'message' => "You have successfully logged in!"
        ]);
    }

    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->success(['message' => "You have successfully logged out!"]);
    }

    public function getAdminPermissions(Request $request)
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
}
