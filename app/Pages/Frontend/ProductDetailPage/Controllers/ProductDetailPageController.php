<?php

namespace App\Pages\Frontend\ProductDetailPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\Frontend\ProductDetailPage\Services\ProductDetailPageService;

class ProductDetailPageController extends Controller
{

    public function getProductDetail($slug, ProductDetailPageService $productService)
    {


        $product  = $productService->getProductDetail($slug);
        try {
            return response()->success([
                'product' => $product,
                'sizeOptions' =>  $productService->getSizeOptions(),
                'categories' => $productService->getCategories(),
                'images' => $productService->getProductImages(),

            ]);
        } catch (PageNotFoundException $ex) {
            return response()->error($ex->getMessage(), 404);
        }
    }
    public function getProductReviews($id, ProductDetailPageService $productService)
    {
        try {

            $response = response()->success([
                'reviews' => $productService->getProductReviews($id),
            ]);
        } catch (PageNotFoundException $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }
    public function getRelatedProducts($productid, ProductDetailPageService $productService)
    {
        try {

            $response = response()->success([
                'reviews' => $productService->getProductReviews($productid),
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


        if (!auth()->check()) {
            $productService->storeProductDetailInSession($request);
            return  response()->success(['requireAuth' => true]);
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

            $productService->storeUserCommentInSession($product->id, $request->comment);

            return  response()->success(['requireAuth' => true]);
        }


        $productService->createComment($request->comment, $product->id);

        return  response()->success([
            'message' => 'Your comment has been added successfully',
            'requireAuth' => false
        ]);
    }
}
