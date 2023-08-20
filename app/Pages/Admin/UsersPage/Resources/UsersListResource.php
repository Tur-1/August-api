<?php

namespace App\Pages\Admin\UsersPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersListResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role_name' => $this->role_name,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,
        ];
    }
}
