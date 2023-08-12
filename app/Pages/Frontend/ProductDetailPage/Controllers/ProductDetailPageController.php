<?php

namespace App\Pages\Frontend\ProductDetailPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\ShoppingCart\Models\ShoppingCart;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\ShoppingCart\Requests\StoreCartItemRequest;
use App\Pages\Frontend\ProductDetailPage\Actions\CreateCommentAction;
use App\Pages\Frontend\ProductDetailPage\Services\ProductDetailPageService;

class ProductDetailPageController extends Controller
{

    public function getProductDetail($slug, ProductDetailPageService $productService)
    {


        try {
            $product  = $productService->getProductDetail($slug);

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
                'relatedProducts' => $productService->getRelatedProducts($productid),
            ]);
        } catch (PageNotFoundException $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }
    public function addToCart(StoreCartItemRequest $request, ProductDetailPageService $productService)
    {

        $request->validated();


        try {
            $productService->addToCart($request);
            $response =  response()->success([
                'message' => 'The product was added to your cart!',
            ]);
        } catch (\Exception $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }
    public function addComment(Request $request, $product_slug, CreateCommentAction $createComment)
    {
        $request->validate(['comment' => 'required|string']);

        if (is_null($product_slug)) return;


        try {

            $createComment->handle($request->comment, $product_slug);
        } catch (\Exception $ex) {
            return  response()->error([
                'message' => 'try Again!'
            ], 404);
        }


        return  response()->success([
            'message' => 'Your comment has been added successfully'
        ]);
    }
}
