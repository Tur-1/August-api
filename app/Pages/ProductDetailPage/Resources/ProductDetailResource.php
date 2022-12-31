<?php

namespace App\Pages\ProductDetailPage\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

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

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' =>  $this->slug,
            'info_and_care' => $this->info_and_care,
            'details' => $this->details,
            'in_stock' => $this->stock > 0 ? true : false,
            'price' =>  $this->price,
            'brand_name' => $this->brand_name,
            'brand_image' => $this->brand_image,
        ];
    }
}