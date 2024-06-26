<?php

namespace App\Pages\Admin\ReviewsPage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user' => $this->whenLoaded('user', [
                'name' => $this->user->name,
                'gender' => $this->user->gender
            ]),
            'admin' => $this->whenLoaded('admin', [
                'name' => $this->admin?->name,
                'gender' => $this->admin?->gender
            ]),
            'product_id' => $this->product_id,
            'product_image' => $this->product->main_image_url,
            'review_id' => $this->review_id,
            'is_read' => $this->is_read,
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
            'reply' => $this->whenLoaded('reply', ReviewResource::make($this->reply)),
        ];
    }
}
