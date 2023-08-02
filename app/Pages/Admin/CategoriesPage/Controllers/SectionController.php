<?php

namespace App\Pages\Admin\CategoriesPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\CategoriesPage\Requests\StoreCategoryRequest;
use App\Pages\Admin\CategoriesPage\Requests\StoreCategorySectionRequest;
use App\Pages\Admin\CategoriesPage\Requests\UpdateCategorySectionRequest;
use App\Pages\Admin\CategoriesPage\Requests\UpdateCategoryRequest;
use App\Pages\Admin\CategoriesPage\Services\CategoryService;
use App\Pages\Admin\CategoriesPage\Services\SectionService;

class SectionController extends Controller
{
    private $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }



    public function getSections(Request $request)
    {
        return $this->sectionService->getSections();
    }

    public function storeNewSection(StoreCategorySectionRequest $request)
    {
        $request->validated();

        $this->sectionService->storeNewSection($request);

        return response()->success([
            'message' => 'section has been created successfully',
        ]);
    }

    public function updateSection(UpdateCategorySectionRequest $request, $id)
    {
        $request->validated();

        return response()->success([
            'message' => 'section has been updated successfully',
            'category' => $this->sectionService->updateSection($request, $id),
        ]);
    }
}
