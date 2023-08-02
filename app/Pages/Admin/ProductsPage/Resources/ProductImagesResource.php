<?php

namespace App\Pages\Admin\ProductsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'image_id' => $this->id,
            'product_id' => $this->product_id,
            'image_url' => $this->image_url,
            'is_main_image' => $this->is_main_image,
        ];
    }
}
