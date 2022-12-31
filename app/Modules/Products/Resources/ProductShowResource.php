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


        if (!is_null($this->categories)) {


            foreach ($this->whenLoaded('categories', $this->categories) as $key  => $value) {
                $section_id = $value['section_id'];
            }

            $category =  collect($this->whenLoaded('categories', $this->categories))->last();
        }
        return [
            $this->id ?  'id' : ' ' => $this->id,
            $this->name ?  'name' : ' ' => $this->name,
            $this->price ?  'price' : ' ' => $this->price,
            'sizes' => $this->whenLoaded('sizes', ProductSizeOptionsResource::collection($this->sizes)),
            'images'  => $this->whenLoaded('productImages', ProductImagesResource::collection($this->productImages)),
            $this->section_id ? 'section_id' : ' ' =>  $section_id ?? null,
            $this->category_id ? 'category_id' : ' ' =>  $category?->id ?? null,
            $this->is_active ? 'status' : ' ' => $this->is_active,
            $this->brand_id ? 'brand_id' : ' ' => $this->brand_id,
            $this->color_id ? 'color_id' : ' ' => $this->color_id,
            $this->brand_id ? 'brand_id' : ' ' => $this->brand_id,
            $this->details ? 'details' : ' ' => $this->details,
            $this->info_and_care ? 'info_and_care' : ' ' => $this->info_and_care,
            $this->shipping_cost ? 'shipping_cost' : ' ' => $this->shipping_cost,
        ];
    }
}