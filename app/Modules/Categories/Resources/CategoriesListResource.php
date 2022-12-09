<?php

namespace App\Modules\Categories\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesListResource extends JsonResource
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
            'id' => $this['id'],
            'name' => $this['name'],
            'slug' => $this['slug'],
            'image_url' => $this['image_url'],
            'active' => request()->route()->parameter('category_slug') == $this['slug'] ? true : false,
            'children' => $this['children'] ? CategoriesListResource::collection($this['children']) : [],

        ];
    }
}