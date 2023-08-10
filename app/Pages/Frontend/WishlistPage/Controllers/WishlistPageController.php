<?php

namespace App\Pages\Frontend\WishlistPage\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Wishlist\Services\WishlistSessionService;
use App\Pages\Frontend\WishlistPage\Services\WishlistPageService;

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


        if (!auth()->check()) {
            (new WishlistSessionService())->storeProduct($product_id);
            return  response()->success(['requireAuth' => true]);
        };


        $inWishlist = (new WishlistPageService())->addProductToWishlist($product_id);


        return  response()->success(['inWishlist' => $inWishlist]);
    }
}
