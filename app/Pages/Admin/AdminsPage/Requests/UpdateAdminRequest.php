<?php

namespace App\Pages\Admin\AdminsPage\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore($this->id),
            ],
            'password' => 'sometimes',
            'role_id' => 'nullable',
            'phone_number' => 'nullable',
            'gender' => 'required|in:Female,Male',
            'permissions_id' => 'nullable'

        ];
    }
}
