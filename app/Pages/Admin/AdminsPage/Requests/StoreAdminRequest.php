<?php

namespace App\Pages\Admin\AdminsPage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'role_id' => 'nullable',
            'phone_number' => 'nullable',
            'gender' => 'in:Female,Male|required',
            'permissions_id' => 'nullable'

        ];

        return $rules;
    }
}
