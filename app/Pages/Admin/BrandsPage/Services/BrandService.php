<?php

namespace App\Pages\Admin\BrandsPage\Services;

use App\Modules\Brands\Repository\BrandRepository;

use App\Pages\Admin\BrandsPage\Resources\BrandResource;

class BrandService
{
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAll($records = 12)
    {
        return BrandResource::collection($this->brandRepository->getAll($records));
    }
    public function getAllBrands()
    {
        return BrandResource::collection($this->brandRepository->getAllBrands());
    }

    public function createBrand($validatedRequest)
    {
        return $this->brandRepository->saveBrand($validatedRequest);
    }

    public function showBrand($id)
    {
        return BrandResource::make($this->brandRepository->getBrand($id));
    }

    public function updateBrand($validatedRequest, $id)
    {
        return BrandResource::make($this->brandRepository->updateBrand($validatedRequest, $id));
    }

    public function deleteBrand($id)
    {
        return $this->brandRepository->deleteBrand($id);
    }
}
