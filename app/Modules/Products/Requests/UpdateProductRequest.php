<?php

namespace App\Modules\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            // 'name' => 'required|string',
            // 'details' => 'required',
            // 'shipping_cost' => 'required',
            // 'info_and_care' => 'required',
            // 'productImages' => 'nullable|file|image|mimes:jpeg,png,jpg,webp|max:5000',
            // 'price' => 'required|numeric',
            // 'discount_amount' => 'required|numeric|required_with:discount_start_at,discount_expires_at',
            // 'discount_start_at' => 'required|required_with:discount_amount',
            // 'discount_expires_at' => 'required|required_with:discount_amount',
            // 'brand_id' => 'required',
            // 'color_id' => 'required',
            // 'category_id' => 'required',
            // 'section_id' => 'required',

            // 'sizes.*.size_id' => 'required|distinct',
            // 'sizes.*.stock' => 'required|numeric',
        ];
    }
}