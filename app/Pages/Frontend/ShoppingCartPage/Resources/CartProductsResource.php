<?php

namespace App\Pages\Frontend\ShoppingCartPage\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Modules\Products\Services\ProductDiscountService;

class CartProductsResource extends JsonResource
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

        $size = $this['sizes']->find($this['pivot']['size_id']);


        $price = $discountService['price'];
        $total_price = intval($price) * $this['pivot']['quantity'];

        return [
            'cart_item' => [
                'id' => $this['pivot']->id,
                'quantity' =>  $this['pivot']->quantity,
                'shipping_cost' => $this['shipping_cost'],
                'sizes' => $this['sizes'],
                'total_price' => $total_price,
                'stock_size' => $size->pivot->stock,
                'size_id' => $size->pivot->id,
                'in_stock' => $size->pivot->stock > 0 ? true : false,
            ],
            'product' => [
                'id' => $this['id'],
                'name' => $this['name'],
                'slug' =>  $this['slug'],
                'brand_name' => $this['brand_name'],
                'main_image_url' => $this['main_image_url'],
                'main_image_full_name' => $this['main_image_full_name'],
                'price' => $price,
                'price' => $discountService['price'],
                'price_before_discount' => $discountService['price_before_discount'],
                'discount_amount' => $discountService['discount_amount'],
                'stock' => $this['stock'],
                'size' => $size->name,

            ],

            // 'inWishlist' => in_array($this['id'],  app('inWishlist')),


        ];
    }
}
