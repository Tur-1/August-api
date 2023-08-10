<?php

namespace App\Pages\Frontend\ProductDetailPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewsResource extends JsonResource
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
            'user' => [
                'name' => $this->user->name,
                'gender' => $this->user->gender
            ],
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
            'reply' => ProductReviewsResource::make($this->whenLoaded('reply')),
        ];
    }
}
