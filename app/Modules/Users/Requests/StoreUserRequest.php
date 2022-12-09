<?php

namespace App\Modules\Users\Requests;

use Illuminate\Validation\Rule;
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
        ];

        if ($this->getMethod() != 'POST') {

            $rules['email'] = [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(request()->route('id'))
            ];

            $rules['password'] = 'sometimes';
        }


        return $rules;
    }
}