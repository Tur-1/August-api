<?php

namespace App\Modules\Colors\Services;

use App\Modules\Colors\Repository\ColorRepository;

class ColorService
{
    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function getAll($records = 12)
    {
        return $this->colorRepository->getAll($records);
    }

    public function createColor($validatedRequest)
    {
        return $this->colorRepository->saveColor($validatedRequest);
    }

    public function showColor($id)
    {
        return $this->colorRepository->getColor($id);
    }

    public function updateColor($validatedRequest, $id)
    {
        return $this->colorRepository->updateColor($validatedRequest, $id);
    }

    public function deleteColor($id)
    {
        return $this->colorRepository->deleteColor($id);
    }
}