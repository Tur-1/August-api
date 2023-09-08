<?php

namespace App\Pages\Frontend\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'register_name' => ['required', 'string', 'max:255', 'min:2'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_password' => 'required|same:password_confirmation|min:4',
            'password_confirmation' => 'required',
            'gender' => 'in:Female,Male'
        ];
    }
}
