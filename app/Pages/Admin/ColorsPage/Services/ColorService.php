<?php

namespace App\Pages\Admin\ColorsPage\Services;

use App\Modules\Colors\Repository\ColorRepository;
use App\Pages\Admin\ColorsPage\Resources\ColorResource;

class ColorService
{
    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function getAll($records = 12)
    {
        return ColorResource::collection($this->colorRepository->getAll($records));
    }
    public function getAllColors()
    {
        return ColorResource::collection($this->colorRepository->getAllColors());
    }

    public function createColor($validatedRequest)
    {
        return $this->colorRepository->saveColor($validatedRequest);
    }

    public function showColor($id)
    {
        return ColorResource::make($this->colorRepository->getColor($id));
    }

    public function updateColor($validatedRequest, $id)
    {
        return ColorResource::make($this->colorRepository->updateColor($validatedRequest, $id));
    }

    public function deleteColor($id)
    {
        return $this->colorRepository->deleteColor($id);
    }
}
