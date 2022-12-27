<?php

namespace App\Modules\Products\Repository;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductImage;
use App\Traits\ImageUpload;

class ProductImageRepository
{
    use ImageUpload;

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
                $this->productImage::query()
                    ->where('product_id', $image->product_id)->first()
                    ->update(
                        [
                            'is_main_image' => true
                        ]
                    );
            }

            $this->destroyModelWithImage($image, $image->image_path);
        }
    }

    public function updateProductMainImage($id)
    {

        $image =  $this->productImage->find($id);

        $this->productImage::query()
            ->where('product_id', $image->product_id)
            ->update(
                [
                    'is_main_image' => false
                ]
            );

        return $image->update(['is_main_image' => true]);
    }
}