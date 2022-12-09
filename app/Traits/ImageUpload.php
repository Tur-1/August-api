<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


trait ImageUpload
{


    private $imagesPath = 'public/images/';


    /**
     * @return image name 
     */
    public function uploadImage($imageRequest, $Folder): string
    {
        // generate unique name for the image
        $newImageName = $this->generateUniqueImageName($imageRequest->getClientOriginalName(), 'webp');

        // convert image to webp 
        $webpImage = \Image::make($imageRequest)->encode('webp', 90);

        // upload image to server
        Storage::put($this->imagesPath . $Folder . '/' . $newImageName, $webpImage);

        return $newImageName;
    }

    public function generateUniqueImageName($imageOriginalName, $extension): string
    {
        $time = time();
        $newImageName =   $time . '-' . Str::slug(explode('.', $imageOriginalName)[0], '_');
        return $newImageName . '.' . $extension;
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
    public function destroyModelWithImage($model, $imagePath)
    {
        $model->delete();

        Storage::delete($this->imagesPath . $imagePath);
    }

    public function destroyImage($imagePath)
    {
        Storage::delete($this->imagesPath . $imagePath);
    }
}