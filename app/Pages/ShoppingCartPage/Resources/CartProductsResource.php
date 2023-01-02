<?php

namespace App\Pages\ShoppingCartPage\Resources;

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

        $size = $this->sizes->find($this->pivot->size_id);

        $price = $discountService['price_before_discount'] != null ? $discountService['price_before_discount'] : $discountService['price'];
        $total_price = intval($price) * $this->pivot->quantity;

        return [
            'cart_item_id' => $this->pivot->id,
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'in_stock' => $this->stock > 0 ? true : false,
            'price' =>  $this->price,
            'brand_name' => $this->brand_name,
            'main_image_url' => $this->main_image_url,
            'inWishlist' => in_array($this->id,  app('inWishlist')),
            'price' => $discountService['price'],
            'total_price' => $total_price,
            'price_before_discount' => $discountService['price_before_discount'],
            'discount_amount' => $discountService['discount_amount'],
            'quantity' =>  $this->pivot->quantity,
            'stock_size' => $size->pivot->stock,
            'shipping_cost' => $this->shipping_cost,
            'size' => $size->name,
            'size_id' => $this->pivot->size_id,
        ];
    }
}