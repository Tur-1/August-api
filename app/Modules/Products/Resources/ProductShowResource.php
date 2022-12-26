<?php

namespace App\Modules\Products\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


        foreach ($this->whenLoaded('categories', $this->categories) as $key => $value) {
            $section_id = $value['section_id'];
        }

        $category =  collect($this->whenLoaded('categories', $this->categories))->last();


        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'sizes' => $this->whenLoaded('sizes', ProductSizeOptionsResource::collection($this->sizes)),
            'images' => $this->whenLoaded('productImages', ProductImagesResource::collection($this->productImages)),
            'section_id' =>  $section_id,
            'category_id' =>  $category->id,
            'status' => $this->is_active,
            'brand_id' => $this->brand_id,
            'color_id' => $this->color_id,
            'brand_id' => $this->brand_id,
            'details' => $this->details,
            'info_and_care' => $this->info_and_care,
            'shipping_cost' => $this->shipping_cost,
        ];
    }
}