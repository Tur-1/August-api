<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


trait ImageUpload
{


    private $imagesPath = 'public/images/';


    /**
     * @return string image name 
     */
    public function uploadImage($imageRequest, $Folder): string
    {
        // generate unique name for the image
        $newImageName = $this->generateUniqueImageName($imageRequest);

        // upload image 

        Storage::putFileAs($this->imagesPath . $Folder, $imageRequest, $newImageName);

        return $newImageName;
    }

    public function generateUniqueImageName($imageOriginalName): string
    {
        $time = time();
        $newImageName =   $time . '-' . $imageOriginalName->getClientOriginalName();
        return $newImageName;
    }

    public function deletePreviousImage($imagePath)
    {
        if ($this->isImageExists($imagePath)) {

            Storage::delete('public/images/' . $imagePath);
        }
    }
    public function isImageExists($imagePath)
    {

        return Storage::exists('public/images/' . $imagePath);
    }
    public function destroyModelWithImage(Model $model, $imagePath)
    {
        $model->delete();

        Storage::delete($this->imagesPath . $imagePath);
    }

    public function destroyImage($imagePath)
    {
        Storage::delete($this->imagesPath . $imagePath);
    }
    public function deleteImagesDirectory($directoryPath)
    {
        Storage::deleteDirectory('public/images/' . $directoryPath);
    }
}
