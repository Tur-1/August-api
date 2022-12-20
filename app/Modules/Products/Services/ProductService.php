<?php

namespace App\Modules\Products\Services;
 
use App\Modules\Products\Repository\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll($records = 12)
    {
        return $this->productRepository->getAll($records);
    }
    public function createProduct($validatedRequest)
    {
        return $this->productRepository->createProduct($validatedRequest);
    }
    public function showProduct($id)
    {
        return $this->productRepository->getProduct($id);
    }
    public function updateProduct($validatedRequest, $id)
    {
        return $this->productRepository->updateProduct($validatedRequest, $id);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}