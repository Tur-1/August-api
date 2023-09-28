<?php

namespace App\Pages\Frontend\CategoriesPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopPageCategoryResource extends JsonResource
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
            'name' => $this['name'],
            'section_id' => $this['section_id'],
            'url' => $this['url'],
        ];
    }
}
