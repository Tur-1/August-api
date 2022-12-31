<?php

namespace App\Pages\ProductDetailPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Users\Models\User;
use App\Pages\ShopPage\Services\ShopPageService;
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

            ]);
        } catch (PageNotFoundException $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }

    public function addComment(ProductDetailPageService $productService, Request $request, $slug)
    {
        $request->validate(['comment' => 'required|string']);

        // if (!auth()->check()) {
        //     Session::put('productComment', [
        //         'product_id' => $product->id,
        //         'comment' => $request->comment,
        //     ]);


        // }


        $productService->createComment($request->comment, $slug);

        return  response()->success(['message' => 'Your comment has been added successfully']);
    }
}