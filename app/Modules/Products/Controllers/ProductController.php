<?php

namespace App\Modules\Products\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modules\Products\Services\ProductService;
use App\Modules\Products\Requests\StoreProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;


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


    public function storeProduct()
    {

        $this->productService->createProduct();

        return response()->success([
            'message' => 'Product has been created successfully',

        ]);
    }


    public function showProduct($id)
    {
        $product =  $this->productService->showProduct($id);

        return response()->success([
            'product' => $product
        ]);
    }
    public function publishProduct($id)
    {
        $this->productService->publishProduct($id);

        return response()->success([
            'message' => 'Product has been published successfully',
        ]);
    }

    public function updateProduct(UpdateProductRequest $request, $id)
    {

        $request->validated();


        $product =  $this->productService->updateProduct($request, $id);


        return response()->success([
            'message' => 'Product has been updated successfully',
            'product' =>  $product,

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