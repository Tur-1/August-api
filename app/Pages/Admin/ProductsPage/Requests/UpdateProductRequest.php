<?php

namespace App\Pages\Admin\ProductsPage\Requests;

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
    protected function prepareForValidation()
    {
        $sizeOptions = [];
        foreach ($this->sizes as $size) {
            $size = json_decode($size, true);

            $sizeOptions[] = ['size_id' => $size['size_id'], 'stock' => $size['stock']];
        }

        $this->merge([
            'sizes' => $sizeOptions,
        ]);
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
            'name' => 'required|string',
            'details' => 'nullable',
            'shipping_cost' => 'nullable',
            'info_and_care' => 'nullable',
            'productImages.*' => 'nullable|file|image|mimes:jpeg,png,jpg,webp|max:5000',
            'price' => 'required|numeric',
            'discount_amount' => 'nullable|numeric|required_with:discount_start_at,discount_expires_at',
            'discount_type' => 'nullable|required_with:discount_amount',
            'discount_start_at' => 'nullable|required_with:discount_amount',
            'discount_expires_at' => 'nullable|required_with:discount_amount',
            'brand_id' => 'required',
            'color_id' => 'required',
            'category_id' => 'required',
            'section_id' => 'required',
            'sizes.*.size_id' => 'required|distinct',
            'sizes.*.stock' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [

            'sizes.*.size_id.required' => 'The size is required',
            'sizes.*.stock.required' => 'The stock is required',
            'sizes.*.size_id.distinct' => 'The Size field has a duplicate value',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'productImages.*' => ' image',
        ];
    }
}
