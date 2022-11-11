<?php

namespace App\Pages\Frontend\ShopPage\Resources;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesResource extends JsonResource
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
            'id' => $this['id'],
            'name' => $this['name'],
            'slug' => $this['slug'],
            'image_url' => $this['image_url'],
            'active' => request()->route()->parameter('category_slug') == $this['slug'] ? true : false,
            'children' => $this['children'] ? CategoriesResource::collection($this['children']) : [],

        ];
    }
}