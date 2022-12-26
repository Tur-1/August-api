<?php

namespace App\Modules\Products\Services;

use App\Modules\Products\Repository\ProductImageRepository;

class ProductImageService
{
    private $productImageRepository;

    public function __construct(ProductImageRepository $productImageRepository)
    {
        $this->productImageRepository = $productImageRepository;
    }

    public function deleteProductImage($id)
    {
        return $this->productImageRepository->deleteProductImage($id);
    }
}