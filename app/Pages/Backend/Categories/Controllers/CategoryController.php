<?php

namespace App\Pages\Backend\Categories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Backend\Categories\Requests\StoreCategoryRequest;
use App\Pages\Backend\Categories\Services\CategoryService;


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


    public function store(Request $request)
    {
        // $validatedReqeust = $request->validated();

        return $this->categoryService->storeCategory($request);

        return response()->success([
            'message' => 'category has been created successfully'
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