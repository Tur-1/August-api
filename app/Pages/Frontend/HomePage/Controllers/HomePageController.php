<?php

namespace App\Pages\Frontend\HomePage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\HomePage\Services\HomePageService;

class HomePageController extends Controller
{


    public function getBanners(HomePageService $homePageService)
    {
        $banners = $homePageService->getBanners();
        $mediumBanners =  $homePageService->getMediumBanners($banners);
        $largeBanners = $homePageService->getLargeBanners($banners);

        return  response()->success([
            'largeBanners' =>  $largeBanners,
            'mediumBanners' => $mediumBanners,
        ]);
    }

    public function getLatestProducts(HomePageService $homePageService)
    {
        return  response()->success([
            'products' =>  $homePageService->getLatestProducts(),
        ]);
    }
}
