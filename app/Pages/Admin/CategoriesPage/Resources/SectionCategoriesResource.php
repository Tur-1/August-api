<?php

namespace App\Pages\Admin\CategoriesPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionCategoriesResource extends JsonResource
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
            'section_id'   => $this['section_id'],
            'parent_id'  => $this['parent_id'],
            'image_url'  => $this['image_url'],
        ];
    }
}
