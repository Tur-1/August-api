<?php

namespace App\Pages\Frontend\HomePage\Services;

use App\Modules\Banners\Repository\BannerRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\HomePage\Resources\HomeBannerResource;
use App\Pages\Frontend\HomePage\Resources\LatestProductsResource;

class  HomePageService
{

    public function getLatestProducts()
    {

        $products = (new ProductRepository())->getHomePageProducts();

        $wishlistIds =  (new WishlistRepository())->getWishlistProductsIds();

        $products->each(function ($product) use ($wishlistIds) {
            $product->inWishlist = in_array($product->id, $wishlistIds);
        });
        return  LatestProductsResource::collection($products);
    }
    public function getBanners()
    {
        return (new BannerRepository())->getActiveBanners();
    }


    public function getMediumBanners($banners)
    {
        return  HomeBannerResource::collection($banners->where('type', 'medium'));
    }
    public function getLargeBanners($banners)
    {

        return  HomeBannerResource::collection($banners->where('type', 'large'));
    }
}
