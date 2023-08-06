<?php

namespace App\Modules\ShoppingCart\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartItemRequest extends FormRequest
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
            'size_id' => 'required',
            'product_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'size_id.required' => 'The size is required',
            'product_id.required' => 'The size  is required'
        ];
    }
}
