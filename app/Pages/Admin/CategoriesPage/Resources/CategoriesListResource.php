<?php

namespace App\Pages\Admin\CategoriesPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesListResource extends JsonResource
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
            'slug' => $this['slug'],
            'section_name'  =>  $this->section?->name,
            'is_section'    => $this['is_section'],
            'image_url'  => $this['image_url'],

        ];
    }
}
