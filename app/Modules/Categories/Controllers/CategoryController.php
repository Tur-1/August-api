<?php

namespace App\Modules\Categories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Categories\Requests\StoreCategoryRequest;
use App\Modules\Categories\Requests\StoreCategorySectionRequest;
use App\Modules\Categories\Requests\UpdateCategorySectionRequest;
use App\Modules\Categories\Services\CategoryService;


class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        return $this->categoryService->getAllCategories($request->per_page);
    }
    public function getCategoriesBySection($section_id)
    {
        return $this->categoryService->getCategoriesBySection($section_id);
    }

    public function getSections(Request $request)
    {
        return $this->categoryService->getSections();
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        $this->categoryService->storeCategory($request);

        return response()->success([
            'message' => 'category has been created successfully',

        ]);
    }

    public function storeNewSection(StoreCategorySectionRequest $request)
    {
        $validatedReqeust = $request->validated();


        $this->categoryService->storeNewSection($validatedReqeust);

        return response()->success([
            'message' => 'section has been created successfully',
        ]);
    }
    public function updateSection(UpdateCategorySectionRequest $request,  $id)
    {

        $validatedReqeust = $request->validated();

        return response()->success([
            'message' => 'section has been updated successfully',
            'category' => $this->categoryService->updateSection($validatedReqeust, $id),
        ]);
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategory($id);

        return response()->success($category);
    }

    public function update(StoreCategoryRequest $request,  $id)
    {
        $validatedReqeust = $request->validated();

        return $validatedReqeust;
        $category = $this->categoryService->updateCategory($validatedReqeust, $id);

        return response()->success([
            'message' => 'category has been updated successfully',
            'category' =>  $category,
        ]);
    }

    public function destroy($id)
    {
        $this->categoryService->destroyCategory($id);

        return response()->success([
            'message' => 'category has been deleted successfully',
        ]);
    }
}