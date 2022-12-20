<?php

namespace App\Modules\Products\Repository;

use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product =$product;
    }
    public function getAll($records)
    {
        return $this->product->paginate($records);
    }
    public function createProduct($validatedRequest)
    {
        return $this->product->create($validatedRequest);
    }
    public function getProduct($id)
    {
        return $this->product->find($id);
    }
    public function updateProduct($validatedRequest, $id)
    {
        $product = $this->getProduct($id);
        $product->update($validatedRequest);
        return  $product;
    }
    public function deleteProduct($id)
    {
        return $this->product->where('id', $id)->delete();
    }
}