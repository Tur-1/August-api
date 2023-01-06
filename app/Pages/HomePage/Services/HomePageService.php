<?php

namespace App\Pages\HomePage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Banners\Repository\BannerRepository;
use App\Pages\HomePage\Resources\HomeBannerResource;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\ShopPage\Resources\ProductsListResource;

class  HomePageService
{

    public function getLatestProducts()
    {
        return  ProductsListResource::collection((new ProductRepository())->getLatestProducts());
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