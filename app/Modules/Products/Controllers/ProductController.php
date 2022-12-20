<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\Services\ProductService;


class ProductController extends Controller
{


    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

 
    public function index(Request $request)
    {
       return  $this->productService->getAll();
    }

   
    public function storeProduct(StoreProductRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->productService->createProduct($validatedRequest);
        
        return response()->success([
            'message' => 'Product has been created successfully'
        ]);
    }

    
    public function showProduct($id)
    {
        $product =  $this->productService->showProduct($id);

        return response()->success([
            'product' => $product
        ]);
    }

 
    public function updateProduct(UpdateProductRequest $request, $id)
    {
        $validatedRequest = $request->validated();

       $product =  $this->productService->updateProduct($validatedRequest, $id);

       return response()->success([
           'message' => 'Product has been updated successfully',
           'product' => $product,
       ]);
    }

   
    public function destroyProduct($id)
    {
        
        $this->productService->deleteProduct($id);

        return response()->success([
            'message' => 'Product has been deleted successfully',
        ]);
    }
}