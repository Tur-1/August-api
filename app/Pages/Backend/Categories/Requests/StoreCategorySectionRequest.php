<?php

namespace App\Modules\Backend\Categories\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategorySectionRequest extends FormRequest
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
                Rule::unique('categories', 'name')
            ],
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000']

        ];

        if ($this->getMethod() != 'POST') {
            $rules['name'] = [
                'required',
                'max:60',
                Rule::unique('categories', 'name')->ignore($this->section->id)
            ];
        }


        return $rules;
    }
}