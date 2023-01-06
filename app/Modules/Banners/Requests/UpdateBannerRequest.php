<?php

namespace App\Modules\Banners\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBannerRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'title' => 'required',
            'link' => 'nullable',
            'image' => ['sometimes',  'file', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5000'],
            'type' => 'required|in:small,medium,large',

        ];


        return $rules;
    }
    public function messages()
    {
        return [
            'title.required' => 'The banner title is required',
            'image.required' => 'The banner Image is required',

        ];
    }
}