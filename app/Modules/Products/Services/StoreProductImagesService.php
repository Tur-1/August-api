<?php

namespace App\Modules\Products\Services;

use App\Facades\FileUpload;
use Illuminate\Support\Arr;

class StoreProductImagesService
{

    private $productImagesFolder = 'products/product_';
    private $images = [];



    public function store($product, $product_images)
    {

        $imagesFolder = $this->getImagesFolder($product->id);

        if ($this->isExists($product_images)) {

            foreach ($product_images as $image) {
                $newImageName = FileUpload::storeImage($image['file'],  $imagesFolder);
                $this->images[] = [
                    'image' => $newImageName,
                    'is_main_image' => $image['is_main_image'] == 'true' ? 1 : 0,
                ];
            }

            $mainImage = collect($this->images)->where('is_main_image', true)->first();

            // set first image as main image if the user didn't choose the main image
            if (is_null($mainImage)) {
                Arr::set($this->images[0], 'is_main_image', 1);
            }
            $product->productImages()->createMany($this->images);
        }
    }



    private function isExists($productImages)
    {
        return !is_null($productImages) || !empty($productImages);
    }
    private function getImagesFolder($productId)
    {
        return  $this->productImagesFolder . $productId;
    }
}
