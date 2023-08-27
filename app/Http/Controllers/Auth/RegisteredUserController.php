<?php

namespace App\Http\Controllers\Auth;

use App\Mail\WelcomeMail;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Modules\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'register_name' => ['required', 'string', 'max:255', 'min:2'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_password' => 'required|same:password_confirmation|min:4',
            'password_confirmation' => 'required',
            'gender' => 'in:Female,Male'
        ]);




        $user = User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'password' => $request->register_password,
            'gender' => $request->gender,
        ]);


        event(new Registered($user));

        Auth::guard('web')->login($user, true);
        Mail::to($user->email)->send(new WelcomeMail($user->name));
        return response()->noContent();
    }
}
