<?php

namespace App\Pages\WishlistPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\WishlistPage\Services\WishlistPageService;

class WishlistPageController extends Controller
{


    public function getUserWishlist(WishlistPageService $wishlistPageService)
    {
        return  response()->success([
            'products' =>  $wishlistPageService->getUserWishlist(),
            'wishlistCount' =>  $wishlistPageService->countWishlistProducts(),
        ]);
    }
    public function addToWishlist(Request $request)
    {

        (new WishlistPageService())->addProductToWishlist($request->product_id);
        return  response()->success();
    }
}