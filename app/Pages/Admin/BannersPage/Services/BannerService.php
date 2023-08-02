<?php

namespace App\Pages\Admin\BannersPage\Services;

use App\Modules\Banners\Repository\BannerRepository;
use App\Pages\Admin\BannersPage\Resources\BannerResource;

class BannerService
{
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function getAll($records = 12)
    {
        return BannerResource::collection($this->bannerRepository->getAll($records));
    }
    public function createBanner($validatedRequest)
    {
        return $this->bannerRepository->saveBanner($validatedRequest);
    }

    public function publishBanner($id)
    {

        return  $this->bannerRepository->publishBanner($id);
    }
    public function showBanner($id)
    {

        return  BannerResource::make($this->bannerRepository->getBanner($id));
    }
    public function updateBanner($validatedRequest, $id)
    {
        return BannerResource::make($this->bannerRepository->updateBanner($validatedRequest, $id));
    }
    public function deleteBanner($id)
    {
        return $this->bannerRepository->deleteBanner($id);
    }
}
