<?php

namespace App\Pages\Frontend\MyAccountPage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
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
            'full_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required|numeric|digits_between:9,13',
            'street' => 'required',
        ];
    }
}