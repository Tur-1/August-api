<?php

namespace App\Providers;

use App\Modules\Users\Repository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResourceCollection::withoutWrapping();
        JsonResource::withoutWrapping();

        Response::macro('success', function ($data) {
            return response()->json($data, 200);
        });

        Response::macro('error', function ($message, $status = 400) {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $status);
        });

        $this->loadMigrationsFrom(glob(base_path('/app/Modules/*/Database/*')));


        $this->app->singleton('inWishlist', function ($app) {
            $inWishlist = [];
            if (Route::is('homePage') || Route::is('shop.categoryPage') || Route::is('productDetailPage') || Route::is('wishlistPage')) {
                $inWishlist = (new UserRepository())->getWishlistProductsIds();
            }
            return $inWishlist;
        });
        $this->app->singleton('cartCounter', function ($app) {

            $cartCounter = 0;
            if (!Route::is('admin.*') && Auth::check()) {

                $cartCounter = (new UserRepository())->getCartProductsCount();
            }
            return $cartCounter;
        });
    }
}