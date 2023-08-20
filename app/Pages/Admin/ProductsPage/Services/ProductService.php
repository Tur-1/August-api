<?php

namespace App\Pages\Admin\ProductsPage\Services;

use App\Pages\Admin\ProductsPage\Resources\ProductResource;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\Admin\ProductsPage\Resources\ProductShowResource;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll($records = 12)
    {
        return ProductResource::collection($this->productRepository->getAll($records));
    }
    public function createProduct()
    {
        return $this->productRepository->createProduct();
    }
    public function showProduct($id)
    {

        return ProductShowResource::make($this->productRepository->getProduct($id));
    }

    public function updateProduct($validatedRequest, $id)
    {
        $this->productRepository->updateProduct($validatedRequest, $id);

        return $this->showProduct($id);
    }
    public function publishProduct($id, $value)
    {
        return $this->productRepository->publishProduct($id, $value);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
