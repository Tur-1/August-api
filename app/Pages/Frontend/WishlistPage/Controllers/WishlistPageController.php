<?php

namespace App\Pages\Frontend\WishlistPage\Controllers;

use App\Http\Controllers\Controller;
use App\Pages\Frontend\WishlistPage\Services\WishlistPageService;
use Illuminate\Support\Facades\Session;

class WishlistPageController extends Controller
{


    public function getUserWishlist(WishlistPageService $wishlistPageService)
    {
        return  response()->success([
            'products' =>  $wishlistPageService->getWishlistProducts(),
        ]);
    }
    public function addToWishlist($product_id)
    {


        // if (!auth()->check()) {
        //     Session::put('wishlistItemId', $product_id);

        //     return  response()->success(['requireAuth' => true]);
        // };


        $inWishlist = (new WishlistPageService())->addProductToWishlist($product_id);


        return  response()->success(['inWishlist' => $inWishlist]);
    }
}
