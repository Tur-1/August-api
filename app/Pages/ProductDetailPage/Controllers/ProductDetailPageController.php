<?php

namespace App\Pages\ProductDetailPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\ProductDetailPage\Services\ProductDetailPageService;

class ProductDetailPageController extends Controller
{

    public function getProductDetail($slug, ProductDetailPageService $productService)
    {


        try {


            $response = response()->success([
                'product' => $productService->getProductDetail($slug),
                'sizeOptions' =>  $productService->getSizeOptions(),
                'categories' => $productService->getCategories(),
                'images' => $productService->getProductImages(),
                'reviews' => $productService->getProductReviews(),
                'relatedProducts' => $productService->getRelatedProducts(),

            ]);
        } catch (PageNotFoundException $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }
    public function addToShoppingCart(Request $request, ProductDetailPageService $productService)
    {

        if (is_null($request->size_id) || is_null($request->product_id)) {
            return ['status' => 404];
        }
        $productService->addToShoppingCart($request);

        return  response()->success([
            'message' => 'The product was added to your cart!',
        ]);
    }
    public function addComment(ProductDetailPageService $productService, Request $request, $slug)
    {
        $request->validate(['comment' => 'required|string']);

        $product =  (new ProductRepository())->findProductBySlug($slug);
        if (is_null($slug) || is_null($product))  return;

        if (!auth()->check()) {
            Session::put('productComment', [
                'product_id' => $product->id,
                'comment' => $request->comment,
            ]);


            return  response()->success(['requireAuth' => true]);
        }


        $productService->createComment($request->comment, $slug);

        return  response()->success(['message' => 'Your comment has been added successfully', 'requireAuth' => false]);
    }
}