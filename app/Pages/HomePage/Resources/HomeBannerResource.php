<?php

namespace App\Pages\HomePage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Backend\Products\Services\ProductDiscountService;

class HomeBannerResource extends JsonResource
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
            'link' => $this->link,
            'image_url' => $this->image_url
        ];
    }
}