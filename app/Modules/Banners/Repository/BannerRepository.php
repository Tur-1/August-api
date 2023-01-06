<?php

namespace App\Modules\Banners\Repository;

use Illuminate\Support\Str;
use App\Modules\Banners\Models\Banner;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BannerRepository
{
    use ImageUpload;

    private $imageFolder = 'augustbanners';
    private $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }
    public function getAll($records)
    {
        return $this->banner->get();
    }
    public function getActiveBanners()
    {
        return $this->banner->where('is_active', true)->get();
    }
    public function createBanner($validatedRequest)
    {
        return $this->banner->create($validatedRequest);
    }
    public function saveBanner($validatedRequest, Banner $banner = null)
    {
        if (is_null($banner)) {
            $banner = new Banner();
        }

        $banner->title = Str::title($validatedRequest->title);
        $banner->type = $validatedRequest->type;
        $banner->link =  $validatedRequest->link ?? '#';

        if ($validatedRequest->hasFile('image')) {
            $this->deletePreviousImage($this->getBrandOldImagePath($banner->image));
            $banner->image = $this->uploadImage($validatedRequest->file('image'), $this->imageFolder);
        }

        $banner->save();
    }
    public function getBanner($id)
    {
        return $this->banner->find($id);
    }
    public function updateBanner($validatedRequest, $id)
    {
        $banner = $this->getBanner($id);

        $this->saveBanner($validatedRequest, $banner);

        return $banner;
    }


    public function deleteBanner($id)
    {
        $banner = $this->getBanner($id);

        $this->destroyModelWithImage($banner, $this->getBrandOldImagePath($banner->image));
    }

    private function getBrandOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}