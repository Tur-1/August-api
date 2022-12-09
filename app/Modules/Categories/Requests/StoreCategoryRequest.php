<?php

namespace App\Modules\Categories\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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


        return $this->getMethod();
        $rules = [

            'name' => [
                'required',
                'max:60',
                Rule::unique('categories', 'name')->where('section_id', $this->section_id)
            ], 'section_id' => 'required',
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:1'],
            'parent_id' => 'nullable',

        ];

        if ($this->getMethod() != 'POST') {

            $rules['name'] = [
                'required',
                'max:60',
                Rule::unique('categories', 'name')
                    ->where('section_id', $this->section_id)
                    ->ignore($this->id)
            ];
        }


        return $rules;
    }
}