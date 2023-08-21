<?php

namespace App\Pages\Admin\ReviewsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsListResource extends JsonResource
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
            'id' =>  $this->id,
            'user' => [
                'name' => $this->user->name,
            ],
            'product_id' => $this->product_id,
            'product_image' => $this->product->main_image_url,
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
        ];
    }
}
