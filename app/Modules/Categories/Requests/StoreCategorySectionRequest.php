<?php

namespace App\Modules\Categories\Requests;

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
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000']

        ];




        return $rules;
    }
}