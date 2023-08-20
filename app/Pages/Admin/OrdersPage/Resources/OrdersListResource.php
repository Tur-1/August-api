<?php

namespace App\Pages\Admin\OrdersPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersListResource extends JsonResource
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
            'id' => $this['id'],
            'user_name' =>  $this['user']['name'],
            'date' => $this['created_at']->format('d/m/Y h:i A'),
            'status' => $this['status'],
            'sub_total' =>  $this['sub_total'],
            'total' => $this['total'],
            'shipping_fees' => $this['shipping_fees'] != 0 ? $this['shipping_fees'] . ' SAR' : 'Free',
        ];
    }
}
