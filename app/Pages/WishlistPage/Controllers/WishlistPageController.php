<?php

namespace App\Pages\WishlistPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\WishlistPage\Services\WishlistPageService;

class WishlistPageController extends Controller
{


    public function getUserWishlist(WishlistPageService $wishlistPageService)
    {
        return  response()->success([
            'products' =>  $wishlistPageService->getUserWishlist(),
        ]);
    }
    public function addToWishlist($product_id)
    {

        (new WishlistPageService())->addProductToWishlist($product_id);


        return response()->success((new UserRepository())->getWishlistProductsIds());
    }
}