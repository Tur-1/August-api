<?php

namespace App\Modules\Categories\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'slug' => $this['slug'],
            'section_name'  => $this->section?->name,
            'section_id'   => $this['section_id'],
            'is_section'    => $this['is_section'],
            'parent_id'  => $this['parent_id'],
            'image_url'  => $this['image_url'],
            'children'  => $this['children'] ? CategoriesResource::collection($this['children']) : [],
        ];
    }
}