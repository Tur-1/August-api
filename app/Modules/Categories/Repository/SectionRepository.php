<?php

namespace App\Modules\Categories\Repository;

use App\Traits\ImageUpload;
use Illuminate\Support\Str;
use App\Modules\Categories\Models\Category;

class SectionRepository
{
    use ImageUpload;

    private $category;
    private $imageFolder = 'categories';

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getSectionsHasProducts()
    {
        return Category::query()
            ->sections()
            ->hasProducts()
            ->select('id', 'name', 'slug', 'url')
            ->get();
    }

    public function getCategoryWithChildren()
    {
        return $this->category::sections()->get();
    }


    public function getSectionsWithCategories()
    {
        return $this->category::hasProducts()->where('is_section', true);
    }

    public function getSections()
    {
        return $this->category::sections()
            ->select('id', 'name', 'slug')
            ->get();
    }

    public function saveSection($request)
    {

        $this->category->name = $request['name'];
        $this->category->slug = Str::slug($request['name'], '_');
        $this->category->is_section = true;
        $this->category->url = Str::slug($request['name'], '_');
        if ($request->hasFile('image')) {
            $this->deletePreviousImage($this->getCategoryOldImagePath($this->category->image));
            $this->category->image = $this->uploadImage($request->file('image'), $this->imageFolder);
        }

        return $this->category->save();
    }

    public function updateSection($request, $category_id)
    {
        $this->category = $this->category::find($category_id);

        $this->saveSection($request);


        return $this->category;
    }
    private function getCategoryOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}