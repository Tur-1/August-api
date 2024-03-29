<?php

namespace App\Pages\Frontend\MyAccountPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'address_id' => $this->id,
            'address' => $this->address,
            'full_name' => $this->full_name,
            'city' => $this->city,
            'street' => $this->street,
            'phone_number' => $this->phone_number,
        ];
    }
}
