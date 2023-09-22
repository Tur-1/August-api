<?php

namespace App\Modules\Colors\Repository;

use App\Exceptions\PageNotFoundException;
use App\Modules\Colors\Models\Color;
use App\Traits\ImageUpload;
use Illuminate\Support\Str;

class ColorRepository
{
    use ImageUpload;

    private $imageFolder = 'colors';
    private $color;

    public function __construct()
    {

        $this->color = new Color();
    }

    public function getAll($records)
    {
        return $this->color->withCount('products')->paginate($records);
    }
    public function getAllColors()
    {
        return $this->color->get();
    }
    public function getColorsByProductsCategory($category_id)
    {
        return $this->color->query()
            ->whereHasProductsWithCount($category_id)
            ->get();
    }
    public function saveColor($validatedRequest, Color $color = null)
    {
        if (is_null($color)) {
            $color = new Color();
        }

        $color->name = Str::title($validatedRequest->name);
        $color->slug = Str::slug($validatedRequest->name);

        if ($validatedRequest->hasFile('image')) {
            $this->deletePreviousImage($this->getColorOldImagePath($color->image));
            $color->image = $this->uploadImage($validatedRequest->file('image'), $this->imageFolder);
        }

        $color->save();
    }

    public function getColor($id)
    {
        $this->color = $this->color->find($id);
        if (is_null($this->color)) {
            throw new PageNotFoundException();
        }

        return $this->color;
    }

    public function updateColor($validatedRequest, $id)
    {
        $color = $this->getColor($id);
        $this->saveColor($validatedRequest, $color);

        return $color;
    }

    public function deleteColor($id)
    {
        $color = $this->getColor($id);

        $this->destroyModelWithImage($color, $this->getColorOldImagePath($color->image));
    }

    private function getColorOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}
