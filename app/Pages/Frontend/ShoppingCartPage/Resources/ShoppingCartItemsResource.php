<?php

namespace App\Pages\Frontend\ShoppingCartPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Products\Services\ProductDiscountService;


class ShoppingCartItemsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $discount = new ProductDiscountService(
            $this->price,
            $this->price_after_discount,
            $this->discount_start_at,
            $this->discount_expires_at,
            $this->discount_type,
            $this->discount_amount,
        );

        $price = $discount->getPrice();
        $size = $this['sizes']->find($this['pivot']['size_id']);
        $total_price = number_format($price * $this->pivot->quantity, 2, '.', '');

        return [

            'id' => $this->pivot->id,
            'quantity' =>  $this->pivot->quantity,
            'total_price' =>  $total_price,
            'in_stock' => $size->pivot->stock > 0 ? true : false,
            'sizes' => $this['sizes'],
            'size' => [
                'id' =>  $size->pivot->id,
                'name' => $size->name,
                'stock' => $size->pivot->stock,
            ],

            'product' => [
                'id' => $this->id,
                'name' => $this->name,
                'slug' =>  $this->slug,
                'brand_name' => $this->brand_name,
                'main_image_name' => $this->main_image_name,
                'main_image' => $this->main_image,
                'main_image_url' => $this->main_image_url,
                'shipping_cost' => $this->shipping_cost,
                'price' => $price,
                'stock' => $this->stock,
                'discount' => $this->when(
                    $discount->isDiscountValid(),
                    [
                        'amount' => $discount->getDiscountAmount(),
                        'price_before' => $discount->getPriceBeforeDiscount(),
                    ]
                )

            ],

        ];
    }
}