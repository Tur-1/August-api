<?php

namespace App\Pages\Frontend\CategoriesPage\Services;

use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Categories\Repository\SectionRepository;
use App\Pages\Frontend\CategoriesPage\Resources\CategoriesPageResource;
use App\Pages\Frontend\CategoriesPage\Resources\SectionsResource;

class CategoriesPageService
{
    private $categoryRepository;
    private $sectionRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

        $this->sectionRepository = new SectionRepository();
    }


    public function getSectionsWithCategories()
    {


        return CategoriesPageResource::collection(
            $this->categoryRepository->getSectionsWithCategories()
        );
    }
    public function getAllSections()
    {
        return SectionsResource::collection(
            $this->sectionRepository->getSectionsHasProducts()
        );
    }
}
