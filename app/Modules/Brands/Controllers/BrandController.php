<?php

namespace App\Modules\Brands\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Brands\Requests\StoreBrandRequest;
use App\Modules\Brands\Requests\UpdateBrandRequest;
use App\Modules\Brands\Services\BrandService;


class BrandController extends Controller
{


    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }


    public function index(Request $request)
    {

        return  $this->brandService->getAll();
    }
    public function getAllBrands()
    {
        return  $this->brandService->getAllBrands();
    }


    public function storeBrand(StoreBrandRequest $request)
    {
        $request->validated();

        $this->brandService->createBrand($request);

        return response()->success([
            'message' => 'Brand has been created successfully'
        ]);
    }


    public function showBrand($id)
    {
        $brand =  $this->brandService->showBrand($id);

        return response()->success([
            'brand' => $brand
        ]);
    }


    public function updateBrand(UpdateBrandRequest $request, $id)
    {
        $request->validated();

        $brand =  $this->brandService->updateBrand($request, $id);

        return response()->success([
            'message' => 'Brand has been updated successfully',
            'brand' => $brand,
        ]);
    }


    public function destroyBrand($id)
    {

        $this->brandService->deleteBrand($id);

        return response()->success([
            'message' => 'Brand has been deleted successfully',
        ]);
    }
}