<?php

namespace App\Pages\Admin\UsersPage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'nullable',
            'phone_number' => 'nullable',
            'gender' => 'nullable|in:Female,Male',
            'permissions_id' => 'nullable'

        ];

        return $rules;
    }
}