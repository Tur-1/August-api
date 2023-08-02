<?php

namespace App\Pages\Admin\CategoriesPage\Services;

use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Categories\Repository\SectionRepository;
use App\Pages\Admin\CategoriesPage\Resources\CategoriesResource;
use App\Pages\Admin\CategoriesPage\Resources\SectionsResource;

class SectionService
{
    private $categoryRepository;
    private $sectionRepository;

    public function __construct(CategoryRepository $categoryRepository, SectionRepository $sectionRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->sectionRepository = $sectionRepository;
    }


    public function getSections()
    {

        return  SectionsResource::collection($this->sectionRepository->getSections());
    }

    public function storeNewSection($request)
    {
        return $this->sectionRepository->saveSection($request);
    }


    public function updateSection($request, $category_id)
    {
        return CategoriesResource::make(
            $this->sectionRepository->updateSection($request, $category_id)
        );
    }
}
