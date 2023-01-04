<?php

namespace App\Modules\Coupons\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'amount' => $this->amount,
            'starts_at' => $this->starts_at,
            'expires_at' => $this->expires_at,
            'type' => $this->type,
            'minimum_purchases' => $this->minimum_purchases,
            'use_times' => $this->use_times,
            'is_active' => $this->is_active,

        ];
    }
}