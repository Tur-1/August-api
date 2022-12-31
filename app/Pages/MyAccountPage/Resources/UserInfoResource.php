<?php

namespace App\Pages\MyAccountPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
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
            'name' => auth()->user()->name,
            'avatar' => auth()->user()->avatar_url,
            'email' => auth()->user()->email,
            'phone_number' => auth()->user()->phone_number,
            'gender' => auth()->user()->gender,
        ];
    }
}
