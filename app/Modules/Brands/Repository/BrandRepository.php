<?php

namespace App\Modules\Brands\Repository;

use App\Facades\FileUpload;

use Illuminate\Support\Str;
use App\Modules\Brands\Models\Brand;
use App\Exceptions\PageNotFoundException;

class BrandRepository
{


    private $imageFolder = 'brands';
    private $brand;

    public function __construct()
    {
        $this->brand = new Brand();
    }

    public function getAll($records)
    {
        return $this->brand->withCount('products')->paginate($records);
    }
    public function getAllBrands()
    {
        return $this->brand->get();
    }
    public function getBrandsByProductsCategory($category_id)
    {
        return $this->brand->whereHasProductsWithCount($category_id)->get();
    }
    public function saveBrand($validatedRequest, Brand $brand = null)
    {
        if (is_null($brand)) {
            $brand = $this->brand;
        }

        $brand->name = Str::title($validatedRequest->name);
        $brand->slug = Str::slug($validatedRequest->name);

        $brand->image = FileUpload::storeImage(
            requestImage: $validatedRequest->file('image'),
            folderName: $this->imageFolder,
            deleteOldImage: true,
            oldImagePath: $this->getBrandOldImagePath($brand->image)
        ) ?? $brand->image;


        $brand->save();
    }

    public function createBrand($request)
    {
        return $this->saveBrand($request);
    }
    public function getBrand($id)
    {

        $this->brand = $this->brand->find($id);
        if (is_null($this->brand)) {
            throw new PageNotFoundException();
        }

        return $this->brand;
    }

    public function updateBrand($validatedRequest, $id)
    {
        $brand = $this->getBrand($id);

        $this->saveBrand($validatedRequest, $brand);

        return $brand;
    }

    public function deleteBrand($id)
    {
        $brand = $this->getBrand($id);

        $brand->delete();

        FileUpload::deleteImage($this->getBrandOldImagePath($brand->image));
    }

    private function getBrandOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}
