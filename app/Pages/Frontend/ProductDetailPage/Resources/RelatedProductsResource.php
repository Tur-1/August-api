<?php

namespace App\Pages\Frontend\ProductDetailPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Products\Services\ProductDiscountService;

class RelatedProductsResource extends JsonResource
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
            $this->discount['price_after_discount'],
            $this->discount['start_at'],
            $this->discount['expires_at'],
            $this->discount['type'],
            $this->discount['amount'],
        );


        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'brand_name' => $this->brand_name,
            'main_image_url' => $this->main_image_url,
            'inWishlist' => $this->inWishlist,
            'in_stock' => $this->stock > 0 ? true : false,
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
