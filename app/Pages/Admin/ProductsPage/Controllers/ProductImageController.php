<?php

namespace App\Pages\Admin\ProductsPage\Controllers;

use App\Http\Controllers\Controller;
use App\Pages\Admin\ProductsPage\Services\ProductImageService;

class ProductImageController extends Controller
{


    private $productImageService;

    public function __construct(ProductImageService $productImageService)
    {
        $this->productImageService = $productImageService;
    }

    public function destroyProductImage($id)
    {
        if (is_null($id)) return;

        $this->productImageService->deleteProductImage($id);

        return response()->success([
            'message' => 'Product image has been deleted successfully',

        ]);
    }

    public function uploadProductImages($id)
    {
        if (is_null($id)) return;

        $this->productImageService->updateProductMainImage($id);

        return response()->success([
            'message' => 'Product main image has been updated successfully',

        ]);
    }
    public function updateProductMainImage($id)
    {
        if (is_null($id)) return;

        $this->productImageService->updateProductMainImage($id);

        return response()->success([
            'message' => 'Product main image has been updated successfully',

        ]);
    }
}
