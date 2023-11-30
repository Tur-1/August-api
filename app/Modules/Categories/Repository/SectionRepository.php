<?php

namespace App\Modules\Categories\Repository;

use App\Facades\FileUpload;

use Illuminate\Support\Str;
use App\Modules\Categories\Models\Category;

class SectionRepository
{
    

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

        $this->category->image = FileUpload::storeImage(
            requestImage: $request->file('image'),
            folderName: $this->imageFolder,
            deleteOldImage: true,
            oldImagePath: $this->getCategoryOldImagePath($this->category->image)
        ) ??  $this->category->image;

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
