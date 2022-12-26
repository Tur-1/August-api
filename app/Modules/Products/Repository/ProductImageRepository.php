<?php

namespace App\Modules\Products\Repository;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\ProductImage;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Collection;

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
            $this->destroyModelWithImage($image, $image->image_path);
        }
    }
}