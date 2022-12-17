<?php

namespace App\Modules\Coupons\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCouponRequest extends FormRequest
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
        $rules = [
            'code' => ['required', Rule::unique('coupons', 'code')->ignore($this->id)],
            'type' => 'required|in:Percentage,Fixed',
            'amount' => 'required|numeric',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date',
            'minimum_purchases' => 'required|numeric',
            'use_times' => 'required',
            'used_times' => 'nullable',
        ];

        if (request('type') == 'Percentage') {
            $rules['amount'] .= '|max:100';
        }

        return $rules;
    }
}