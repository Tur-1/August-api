<?php

namespace App\Pages\Frontend\ShopPage\Controllers;

use App\Http\Controllers\Controller;
use App\Pages\Frontend\ShopPage\Services\ShopPageService;
use App\Pages\Frontend\ShopPage\Services\CategoriesService;

class ShopPageController extends Controller
{


    public function getCategory($category_url, CategoriesService $categoriesService)
    {

        $category = $categoriesService->getCategoryByUrl($category_url);

        return  response()->success($category);
    }

    public function getProducts($category_url)
    {
        $shopPageService = new ShopPageService($category_url);

        return response()->success([
            'brands' => $shopPageService->getBrands(),
            'products' => $shopPageService->getProducts(),
            'sizes' => $shopPageService->getSizeOptions($category_url),

        ]);
    }
    public function getShopPageTotalProducts($category_url)
    {
        $shopPageService = new ShopPageService($category_url);

        return response()->success([
            'total' => $shopPageService->getShopPageTotalProducts($category_url),
        ]);
    }


    public function getSizes($category_url, ShopPageService $shopPageService)
    {

        return response()->success([
            'sizes' => $shopPageService->getSizeOptions($category_url),
        ]);
    }
    public function getColors($category_url, ShopPageService $shopPageService)
    {

        return response()->success([
            'colors' => $shopPageService->getColors($category_url),
        ]);
    }
}
