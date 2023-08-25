<?php

namespace App\Pages\Admin\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Pages\Admin\Auth\Requests\LoginRequest;

class LoginContoller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {

        $validatedRequest = $request->validated();

        if (!Auth::guard('admin')->attempt($validatedRequest)) {

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }


        $user = auth('admin')->user()->load(['permissions']);
        $access_token =  auth('admin')->user()->createToken('access-token')->plainTextToken;
        $permissions =  $user->permissions->pluck('slug')->toArray();

        return response()->success([
            'user' => $user,
            'permissions' => $permissions,
            'access_token' => $access_token,
            'message' => 'loged in successfully',
        ]);
    }
}
