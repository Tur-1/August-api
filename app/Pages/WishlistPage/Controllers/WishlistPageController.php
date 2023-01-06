<?php

namespace App\Pages\WishlistPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\WishlistPage\Services\WishlistPageService;
use Illuminate\Support\Facades\Session;

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

        if (!auth()->check()) {
            Session::put('wishlistItemId', $product_id);

            return  response()->success(['requireAuth' => true]);
        };
        (new WishlistPageService())->addProductToWishlist($product_id);


        return response()->success((new UserRepository())->getWishlistProductsIds());
    }
}