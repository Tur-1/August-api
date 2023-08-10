<?php

namespace App\Pages\Frontend\ProductDetailPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\ShopPage\Services\ProductDiscountService;

class ProductDetailResource extends JsonResource
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

        $discount = new ProductDiscountService($discountData);;


        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'info_and_care' => $this->info_and_care,
            'details' => $this->details,
            'brand_name' => $this->brand_name,
            'brand_image' => $this->brand_image,
            'main_image_url' => $this->main_image_url,
            'inWishlist' => (new WishlistRepository())->isExists($this->id),
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
