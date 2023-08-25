<?php

namespace App\Pages\Admin\AdminsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminShowResource extends JsonResource
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
            'permissions_id' => $this->permissions->pluck('id')->toArray(),
            'email' => $this->email,
            'role_id' => $this->role_id,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,


        ];
    }
}