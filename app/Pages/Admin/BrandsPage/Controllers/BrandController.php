<?php

namespace App\Pages\Admin\BrandsPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\BrandsPage\Services\BrandService;
use App\Pages\Admin\BrandsPage\Requests\StoreBrandRequest;
use App\Pages\Admin\BrandsPage\Requests\UpdateBrandRequest;

class BrandController extends Controller
{



    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }


    public function index(Request $request)
    {
        $this->userCan('access-brands');
        return  $this->brandService->getAll();
    }
    public function getAllBrands()
    {
        return  $this->brandService->getAllBrands();
    }


    public function storeBrand(StoreBrandRequest $request)
    {
        $this->userCan('create-brands');
        $request->validated();

        $this->brandService->createBrand($request);

        return response()->success([
            'message' => 'Brand has been created successfully'
        ]);
    }


    public function showBrand($id)
    {
        $this->userCan('view-brands');

        $brand =  $this->brandService->showBrand($id);

        return response()->success([
            'brand' => $brand
        ]);
    }


    public function updateBrand(UpdateBrandRequest $request, $id)
    {
        $this->userCan('update-brands');

        $request->validated();

        $brand =  $this->brandService->updateBrand($request, $id);

        return response()->success([
            'message' => 'Brand has been updated successfully',
            'brand' => $brand,
        ]);
    }


    public function destroyBrand($id)
    {
        $this->userCan('delete-brands');

        $this->brandService->deleteBrand($id);

        return response()->success([
            'message' => 'Brand has been deleted successfully',
        ]);
    }
}