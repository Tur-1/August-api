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
            'user' => $this->whenLoaded('user', [
                'name' => $this->user->name,
                'gender' => $this->user->gender
            ]),
            'admin' => $this->whenLoaded('admin', [
                'name' => $this->admin?->name,
                'gender' => $this->admin?->gender
            ]),
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
            'reply' => ProductReviewsResource::make($this->whenLoaded('reply')),
        ];
    }
}
