<?php

namespace App\Modules\Orders\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order' => [
                'id' => $this['id'],
                'user' => [
                    'name' => $this['user']['name'],
                    'email' => $this['user']['email'],
                    'phone_number' => $this['user']['phone_number'],
                ],
                'date' => $this['created_at']->format('d/m/Y h:i A'),
                'status' => $this['status'],
                'subTotal' =>  $this['subTotal'],
                'total' => $this['total'],
                'shipping_fees' => $this['shipping_fees'] != 0 ? $this['shipping_fees'] . ' SAR' : 'Free',
            ],
            'products' => $this->whenLoaded('products', $this['products']),
            'coupon' => $this->whenLoaded('coupon', [
                'code' => $this->coupon?->code,
                'discounted_amount' => $this->coupon?->discounted_amount,
                'amount' => $this->coupon?->type == 'Percentage' ?  $this->coupon?->amount . ' %' : ' SAR',
            ]),
            'address' => $this->whenLoaded('address', $this['address']),
        ];
    }
}