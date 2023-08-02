<?php

namespace App\Pages\Admin\SizesPage\Services;

use App\Modules\Sizes\Repository\SizeRepository;



class SizeService
{
    private $sizeRepository;

    public function __construct(SizeRepository $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }
    public function getAll($records = 12)
    {
        return $this->sizeRepository->getAll($records);
    }
    public function getAllSizes()
    {
        return $this->sizeRepository->getAllSizes();
    }

    public function createSize($validatedRequest)
    {
        return $this->sizeRepository->createSize($validatedRequest);
    }
    public function showSize($id)
    {
        return $this->sizeRepository->getSize($id);
    }
    public function updateSize($validatedRequest, $id)
    {
        return $this->sizeRepository->updateSize($validatedRequest, $id);
    }
    public function deleteSize($id)
    {
        return $this->sizeRepository->deleteSize($id);
    }
}
