<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class ImageUploadService
{


    private $imagesPath = 'public/images/';


    /**
     * @return string image name 
     */
    public function uploadImage($imageRequest, $Folder): string
    {

        // generate unique name for the image
        $newImageName = $this->generateUniqueNameForImage($imageRequest);

        // upload image 
        Storage::putFileAs($this->imagesPath . $Folder, $imageRequest, $newImageName);

        return $newImageName;
    }

    public function generateUniqueNameForImage($imageRequest): string
    {
        $extension = pathinfo($imageRequest->getClientOriginalName(), PATHINFO_EXTENSION);

        // Generate a unique name using a combination of timestamp and random string
        $uniqueName = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;

        return $uniqueName;
    }

    public function deletePreviousImage($imagePath)
    {
        if ($this->isImageExists($imagePath)) {
            Storage::delete($this->imagesPath . $imagePath);
        }
    }
    public function isImageExists($imagePath)
    {
        return Storage::exists($this->imagesPath . $imagePath);
    }


    public function deleteImage($imagePath)
    {
        return Storage::delete($this->imagesPath . $imagePath);
    }
    public function deleteImagesDirectory($directoryPath)
    {
        Storage::deleteDirectory($this->imagesPath . $directoryPath);
    }
}
