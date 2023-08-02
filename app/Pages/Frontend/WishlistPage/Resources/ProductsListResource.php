<?php

namespace App\Pages\Frontend\ShopPage\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

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

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'in_stock' => $this->stock > 0 ? true : false,
            'price' =>  $this->price,
            'brand_name' => $this->brand_name,
            'main_image_url' => $this->main_image_url,
        ];
    }
}
