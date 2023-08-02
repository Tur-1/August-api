<?php

namespace App\Pages\Frontend\CategoriesPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pages\Frontend\CategoriesPage\Services\CategoriesPageService;

class CategoriesPageController extends Controller
{
    private $categoriesPageService;

    public function __construct(CategoriesPageService $categoriesPageService)
    {
        $this->categoriesPageService = $categoriesPageService;
    }

    public function getSectionsWithCategories()
    {
        return $this->categoriesPageService->getSectionsWithCategories();
    }
    public function getAllSections()
    {
        $sections = $this->categoriesPageService->getAllSections();


        return  response()->success([
            'sections' => $sections,
        ]);
    }
}
