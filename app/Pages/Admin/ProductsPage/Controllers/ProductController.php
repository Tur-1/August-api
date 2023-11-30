<?php

namespace App\Pages\Admin\ProductsPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Pages\Admin\ProductsPage\Services\ProductService;
use App\Pages\Admin\ProductsPage\Requests\StoreProductRequest;
use App\Pages\Admin\ProductsPage\Requests\UpdateProductRequest;

class ProductController extends Controller
{


    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index(Request $request)
    {
        $this->userCan('access-products');

        return  $this->productService->getAll();
    }


    public function storeProduct()
    {
        $this->userCan('create-products');

        $product = $this->productService->createProduct();

        return response()->success([
            'message' => 'Product has been created successfully',
            'product' =>  $product,

        ]);
    }


    public function showProduct($id)
    {
        $this->userCan('view-products');

        $product =  $this->productService->showProduct($id);

        return response()->success([
            'product' => $product
        ]);
    }
    public function publishProduct($id, $value)
    {
        $this->userCan('update-products');

        try {
            //code...
            $this->productService->publishProduct($id, $value);

            return response()->success([
                'message' => 'Product has been published successfully',
            ]);
        } catch (\Exception $ex) {
            return response()->error('try Again');
        }
    }

    public function updateProduct(UpdateProductRequest $request, $id)
    {


        $this->userCan('update-products');

        $request->validated();



        $product =  $this->productService->updateProduct($request, $id);


        return response()->success([
            'message' => 'Product has been updated successfully',
            'product' =>  $product,
        ]);
    }


    public function destroyProduct($id)
    {
        $this->userCan('delete-products');

        $this->productService->deleteProduct($id);

        return response()->success([
            'message' => 'Product has been deleted successfully',
        ]);
    }
}
