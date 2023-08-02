<?php

namespace App\Pages\Admin\ProductsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSizeOptionsResource extends JsonResource
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
            'id' => $this->pivot->id,
            'size_id' => $this->pivot->size_id,
            'stock' => $this->pivot->stock,
        ];
    }
}
