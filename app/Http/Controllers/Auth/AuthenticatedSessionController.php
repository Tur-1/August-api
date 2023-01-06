<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use App\Pages\WishlistPage\Services\WishlistPageService;
use App\Pages\ProductDetailPage\Services\ProductDetailPageService;

class AuthenticatedSessionController extends Controller
{

    public function isAuthenticated()
    {
        if (!auth()->check()) {
            return 'false';
        }

        return auth()->user();
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $access_token =  $request->user()->createToken('access-token')->plainTextToken;

        $productComment = Session::get('productComment');
        $message = null;
        $redirect_to = null;

        if (!is_null($productComment)) {
            (new ProductDetailPageService())->createComment($productComment['comment'], $productComment['product_id']);

            Session::remove('productComment');

            $message = 'Your comment has been added successfully';
            $redirect_to = 'product_detail';
        }

        $productDetailCartItem = Session::get('productDetailCartItem');
        if (!is_null($productDetailCartItem)) {
            (new ProductDetailPageService())->addToShoppingCart($productDetailCartItem);

            Session::remove('productComment');

            $message = 'The product was added to your cart!';
            $redirect_to = 'product_detail';
        }

        $wishlistItemId = Session::get('wishlistItemId');
        if (!is_null($wishlistItemId)) {
            (new WishlistPageService())->addProductToWishlist($wishlistItemId);

            Session::remove('productComment');

            $redirect_to = 'wishlist';
        }



        return response()->json([
            'user' => $request->user(),
            'access_token' => $access_token,
            'message' => $message,
            'redirect_to' => $redirect_to,
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}