<?php

namespace App\Pages\HomePage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\HomePage\Services\HomePageService;

class HomePageController extends Controller
{


    public function index(HomePageService $homePageService)
    {
        $banners = $homePageService->getBanners();
        $mediumBanners =  $homePageService->getMediumBanners($banners);
        $largeBanners = $homePageService->getLargeBanners($banners);

        return  response()->success([
            'products' =>  $homePageService->getLatestProducts(),
            'largeBanners' =>  $largeBanners,
            'mediumBanners' => $mediumBanners,
        ]);
    }
}