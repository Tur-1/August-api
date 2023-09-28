<?php

namespace App\Pages\Admin\ProductsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Products\Services\ProductDiscountService;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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


        return [
            'id' => $this->id,
            'name' => $this->name, 
            'stock' => $this->stock,
            'status' => $this->is_active,
            'main_image_url' => $this->main_image_url,
            'price' => $discount->getPrice(),
            'discount' => $this->when(
                $discount->isDiscountValid(),
                [
                    'amount' => $discount->getDiscountAmount(),
                    'price_before' => $discount->getPriceBeforeDiscount(),
                ]
            )
        ];
    }
}
