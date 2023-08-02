<?php

namespace App\Pages\Frontend\ShopPage\Resources;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\Categories\Resources\CategoriesResource;

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
            'id' => $this['id'],
            'name' => $this['name'],
            'slug' => $this['slug'],
            'parent_id'  => $this['parent_id'],
            'image_url'  => $this['image_url'],
            'children'  => $this['children'] ? ShopPageCategoryResource::collection($this['children']) : [],

        ];
    }
}
