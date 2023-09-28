<?php

namespace App\Pages\Frontend\CategoriesPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pages\Frontend\CategoriesPage\Services\CategoriesPageService;

class CategoriesPageController extends Controller
{
    private $categoriesService;

    public function __construct(CategoriesPageService $categoriesPageService)
    {
        $this->categoriesService = $categoriesPageService;
    }

    public function getSectionsWithCategories()
    {
        return $this->categoriesService->getSectionsWithCategories();
    }
    public function getAllSections()
    {
        $sections = $this->categoriesService->getAllSections();


        return  response()->success([
            'sections' => $sections,
        ]);
    }
    public function getCategory($category_url)
    {

        $category = $this->categoriesService->getCategoryByUrl($category_url);

        return  response()->success($category);
    }

    public function getProducts($category_url)
    {
        $this->categoriesService = new CategoriesPageService($category_url);

        return response()->success([
            'brands' => $this->categoriesService->getBrands(),
            'products' => $this->categoriesService->getProducts(),
            'sizes' => $this->categoriesService->getSizeOptions($category_url),

        ]);
    }
    public function getShopPageTotalProducts($category_url)
    {

        return response()->success([
            'total' => $this->categoriesService->getShopPageTotalProducts($category_url),
        ]);
    }


    public function getSizes($category_url)
    {

        return response()->success([
            'sizes' => $this->categoriesService->getSizeOptions($category_url),
        ]);
    }
    public function getColors($category_url)
    {


        return response()->success([
            'colors' => $this->categoriesService->getColors($category_url),
        ]);
    }
}
