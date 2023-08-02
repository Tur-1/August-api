<?php

namespace App\Pages\Frontend\MyAccountPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyAccountPageOrdersResource extends JsonResource
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
            'date' => $this['created_at']->format('d/m/Y h:i A'),
            'status' => $this['status'],
            'subTotal' =>  $this['subTotal'],
            'total' => $this['total'],
            'shipping_fees' => $this['shipping_fees'] != 0 ? $this['shipping_fees'] . ' SAR' : 'Free',
        ];
    }
}
