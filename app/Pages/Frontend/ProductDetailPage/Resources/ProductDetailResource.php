<?php

namespace App\Pages\Frontend\ProductDetailPage\Resources;

use Illuminate\Support\Str;
use App\Modules\Users\Repository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Products\Services\ProductDiscountService;

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

        $discountService =  (new ProductDiscountService())->getDiscount($discountData);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'info_and_care' => $this->info_and_care,
            'details' => $this->details,
            'in_stock' => $this->stock > 0 ? true : false,

            'brand_name' => $this->brand_name,
            'brand_image' => $this->brand_image,
            'inWishlist' => in_array($this->id, app('inWishlist')),
            'price' => $discountService['price'],
            'price_before_discount' => $discountService['price_before_discount'],
            'discount_amount' => $discountService['discount_amount'],
        ];
    }
}
