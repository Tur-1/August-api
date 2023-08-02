<?php

namespace App\Pages\Frontend\CategoriesPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'url' => $this['url'],
            'image_url'  => $this['image_url'],
            'children'  => $this['children'] ? CategoriesPageResource::collection($this['children']) : [],

        ];
    }
}
