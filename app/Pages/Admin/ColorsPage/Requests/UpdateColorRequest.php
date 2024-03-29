<?php

namespace App\Pages\Admin\ColorsPage\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateColorRequest extends FormRequest
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
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'name' => ['required', 'max:60', Rule::unique('colors', 'name')->ignore($this->id)],
        ];
    }
}
