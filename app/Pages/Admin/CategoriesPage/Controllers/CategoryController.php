<?php

namespace App\Pages\Admin\CategoriesPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\CategoriesPage\Requests\StoreCategoryRequest;
use App\Pages\Admin\CategoriesPage\Requests\StoreCategorySectionRequest;
use App\Pages\Admin\CategoriesPage\Requests\UpdateCategorySectionRequest;
use App\Pages\Admin\CategoriesPage\Requests\UpdateCategoryRequest;
use App\Pages\Admin\CategoriesPage\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllCategories(Request $request)
    {


        return $this->categoryService->getAllCategories($request->input('section'), $request->input('search'));
    }


    public function getAllCategoriesBySection($section_id)
    {
        return $this->categoryService->getAllCategoriesBySection($section_id);
    }


    public function storeCategory(StoreCategoryRequest $request)
    {
        $request->validated();

        $this->categoryService->storeCategory($request);

        return response()->success([
            'message' => 'category has been created successfully',
        ]);
    }

    public function showCategory($id)
    {
        $category = $this->categoryService->getCategory($id);

        return response()->success($category);
    }

    public function updateCategory(UpdateCategoryRequest $request, $id)
    {
        $request->validated();

        $category = $this->categoryService->updateCategory($request, $id);

        return response()->success([
            'message' => 'category has been updated successfully',
            'category' => $category,
        ]);
    }

    public function destroyCategory($id)
    {
        $this->categoryService->destroyCategory($id);

        return response()->success([
            'message' => 'category has been deleted successfully',
        ]);
    }
}
