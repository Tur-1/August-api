<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


trait ImageUpload
{

    public function uploadImageInStorage($imageRequest, $Folder): string
    {

        $newImageName = $this->generateUniqueImageName($imageRequest->getClientOriginalName(), $imageRequest->extension());

        $path =    $imageRequest->storeAs('images/' . $Folder, $newImageName, 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        return $newImageName;
    }

    public function uploadImageAsWebp($imageRequest, $Folder): string
    {
        $newImageName = $this->generateUniqueImageName($imageRequest->getClientOriginalName(), 'webp');
        $webpImage = \Image::make($imageRequest)->encode('webp', 90);

        Storage::put('public/images/' . $Folder . '/' . $newImageName, $webpImage);

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

        Storage::delete('public/images/' . $imagePath);
    }
}