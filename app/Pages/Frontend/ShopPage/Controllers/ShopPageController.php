<?php

namespace App\Pages\Frontend\ShopPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category\Repository\CategoryRepository;
use App\Pages\Frontend\ShopPage\Resources\CategoriesResource;
use App\Pages\Frontend\ShopPage\Services\CategoryPageService;

class ShopPageController extends Controller
{

    public function getAllCategories(CategoryRepository $categoryRepository)
    {
        return  response()
            ->success(CategoriesResource::collection($categoryRepository->geSectionsWithCategories()));
    }
    public function categoryPage($slug, CategoryPageService $categoryPageService)
    {

        return  response()->success([
            'category' => $categoryPageService->getCategory($slug),
        ]);
    }
}
