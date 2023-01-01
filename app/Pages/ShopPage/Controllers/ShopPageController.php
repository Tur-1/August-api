<?php

namespace App\Pages\ShopPage\Controllers;

use App\Exceptions\PageNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\ShopPage\Services\ShopPageService;

class ShopPageController extends Controller
{

    public function getSections(ShopPageService $shopPageService)
    {
        return  response()->success([
            'sections' =>  $shopPageService->getSections()
        ]);
    }
    public function getAllCategories(ShopPageService $shopPageService)
    {
        return  response()->success([
            'sections' =>  $shopPageService->getAllCategories()
        ]);
    }
    public function categoryPage($slug, ShopPageService $shopPageService)
    {


        try {

            $category = $shopPageService->getCategory($slug);

            $response = response()->success([
                'category' => $category['category'],
                'categoryChildren' =>  $category['children'],
                'categoryParents' =>  $shopPageService->getAllCategoryParents(),
                'categoryParent' =>  $shopPageService->getCategoryParent(),
                'brands' => $shopPageService->getBrands(),
                'colors' => $shopPageService->getColors(),
                'products' => $shopPageService->getProducts(),
                'sizeOptions' => $shopPageService->getSizeOptions(),
            ]);
        } catch (PageNotFoundException $ex) {
            $response = response()->error($ex->getMessage(), 404);
        }

        return $response;
    }
}