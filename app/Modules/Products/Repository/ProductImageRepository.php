<?php

namespace App\Modules\Products\Repository;

use App\Facades\FileUpload;
use App\Modules\Products\Models\ProductImage;

class ProductImageRepository
{


    private $productImage;

    public function __construct(ProductImage $productImage)
    {
        $this->productImage = $productImage;
    }

    public function deleteProductImage($id)
    {

        $image =  $this->productImage->find($id);

        if (!is_null($image)) {
            if ($image->is_main_image) {
                // if image is the main image ? then set the first image as the main image
                $this->productImage::query()
                    ->where('product_id', $image->product_id)->first()
                    ->update(['is_main_image' => true]);
            }

            $image->delete();
            FileUpload::deleteImage($image->image_path);
        }
    }

    public function updateProductMainImage($id)
    {

        $image =  $this->productImage->find($id);


        $this->productImage::query()
            ->where('product_id', $image->product_id)
            ->update(['is_main_image' => false]);

        return $image->update(['is_main_image' => true]);
    }
}
