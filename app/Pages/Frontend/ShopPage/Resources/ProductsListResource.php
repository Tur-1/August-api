<?php

namespace App\Pages\Frontend\ShopPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Pages\Frontend\ShopPage\Services\ProductDiscountService;
use App\Modules\Coupons\Services\DiscountService;

class ProductsListResource extends JsonResource
{


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $discountData = [
            'price' =>  $this->price,
            'discounted_price' => $this->discounted_price,
            'discount_amount' =>  $this->discount_amount,
            'discount_type' =>  $this->discount_type,
            'discount_start_at' =>  $this->discount_start_at,
            'discount_expires_at' =>   $this->discount_expires_at
        ];

        $discount = new ProductDiscountService($discountData);


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
