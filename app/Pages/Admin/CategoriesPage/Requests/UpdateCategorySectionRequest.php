<?php

namespace App\Pages\Admin\CategoriesPage\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorySectionRequest extends FormRequest
{
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


        $rules = [

            'name' => [
                'required',
                'max:60',
                Rule::unique('categories', 'name')->ignore($this->id)
            ],

            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000']

        ];


        return $rules;
    }
}
