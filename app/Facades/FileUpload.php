<?php

namespace App\Facades;

use App\Services\ImageUploadService;


class FileUpload
{

    /**
     * Stores an image from a request, optionally deleting the old image.
     *
     * @param mixed $requestImage The image data from the request.
     * @param string $folderName The folder where the image will be stored.
     * @param bool $deleteOldImage Determines whether to delete the old image.
     * @param string $oldImagePath
     * @return string|null The name of the stored image or null if no image was provided.
     */
    public static function storeImage($requestImage, $folderName, $deleteOldImage = false, $oldImagePath = '')
    {

        if ($requestImage) {
            $ImageUploadService = new ImageUploadService();
            // generate unique name for the image
            $imageName =  $ImageUploadService->uploadImage($requestImage, $folderName);

            if ($deleteOldImage) {
                $ImageUploadService->deletePreviousImage($oldImagePath);
            }

            return $imageName;
        }


        return null;
    }

    /**
     * Delete image file.
     * @param string $imagePath The path to the image associated with the model.
     * @return void
     */
    public static function deleteImage($imagePath)
    {
        $ImageUploadService = new ImageUploadService();

        $ImageUploadService->deleteImage($imagePath);
    }

    public static function deleteImagesDirectory($directoryPath)
    {
        $ImageUploadService = new ImageUploadService();

        $ImageUploadService->deleteImagesDirectory($directoryPath);
    }
}
