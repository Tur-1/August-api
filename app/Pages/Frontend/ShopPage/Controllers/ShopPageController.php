<?php

namespace App\Pages\Frontend\ShopPage\Controllers;

use App\Exceptions\PageNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\ShopPage\Services\CategoriesService;
use App\Pages\Frontend\ShopPage\Services\ShopPageService;
use Illuminate\Support\Facades\Session;

class ShopPageController extends Controller
{


    public function getCategory($category_url, CategoriesService $categoriesService)
    {

        try {
            $category = $categoriesService->getCategoryByUrl($category_url);

            Session::put('category', $category['category']);
            return  response()->success($category);
        } catch (PageNotFoundException $ex) {
            return response()->error($ex->getMessage(), 404);
        }
    }

    public function getProducts(ShopPageService $shopPageService)
    {
        try {
            return response()->success([
                'brands' => $shopPageService->getBrands(),
                'colors' => $shopPageService->getColors(),
                'products' => $shopPageService->getProducts(),
                'sizeOptions' => $shopPageService->getSizeOptions(),
            ]);
        } catch (PageNotFoundException $ex) {
            return response()->error($ex->getMessage(), 404);
        }
    }
}
