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
            'children' => $this['children'] ? CategoriesListResource::collection($this['children']) : [],

        ];
    }
    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse['links'], $jsonResponse['meta']);
        $response->setContent(json_encode($jsonResponse['data']));
    }
}