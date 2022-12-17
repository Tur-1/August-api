<?php

namespace App\Modules\Brands\Services;

use App\Modules\Brands\Repository\BrandRepository;

class BrandService
{
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAll($records = 12)
    {
        return $this->brandRepository->getAll($records);
    }

    public function createBrand($validatedRequest)
    {
        return $this->brandRepository->saveBrand($validatedRequest);
    }

    public function showBrand($id)
    {
        return $this->brandRepository->getBrand($id);
    }

    public function updateBrand($validatedRequest, $id)
    {
        return $this->brandRepository->updateBrand($validatedRequest, $id);
    }

    public function deleteBrand($id)
    {
        return $this->brandRepository->deleteBrand($id);
    }
}