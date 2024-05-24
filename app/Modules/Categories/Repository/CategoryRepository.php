<?php

namespace App\Modules\Categories\Repository;

use App\Facades\FileUpload;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use App\Exceptions\PageNotFoundException;
use App\Modules\Categories\Models\Category;

class CategoryRepository
{

    private $category;
    private $imageFolder = 'categories';

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategoriesHasProducts()
    {
        return $this->category::query()
            ->select('id', 'name', 'url', 'slug', 'parent_id', 'section_id', 'is_section', 'parents_ids')
            ->hasProducts()
            ->get();
    }



    public function getSectionsWithCategories()
    {
        return  Category::sectionsWithCategories();
    }



    public function getAllCategories($section_id = null, $searchQuery = '')
    {

        return $this->category::WhenSearchByName($searchQuery)
            ->withSection()
            ->WhenSortBySection($section_id)
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }


    public function getAllCategoriesBySection($section_id)
    {
        return $this->category::query()
            ->where('section_id', $section_id)
            ->select('id', 'name', 'section_id', 'parent_id')
            ->get();
    }

    public function find($category_id)
    {

        $this->category = $this->category::find($category_id);
        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }

        return $this->category;
    }
    public function findByUrl($category_url)
    {

        $this->category = $this->category::where('url', $category_url)->first();
        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }

        return $this->category;
    }


    public function save($request)
    {


        $parentId = $request['parent_id'];

        // if there is no parent id , the section id will be the parent for category
        if ($this->isCategoryDoesntHaveParentId($request['parent_id'])) {
            $parentId = $request['section_id'];
        }

        $parentCategory = $this->getParentCategory($parentId);

        $this->category->parents_ids = $parentCategory['parents_ids'];
        $this->category->section_id = $request['section_id'];
        $this->category->parent_id = $parentId;
        $this->category->name = $request['name'];
        $this->category->slug = Str::slug($request['name'], '_');
        $this->category->url =   $parentCategory['url'] . '-' .  Str::slug($request['name'], '_');

        $this->category->image = FileUpload::storeImage(
            requestImage: $request->file('image'),
            folderName: $this->imageFolder,
            deleteOldImage: true,
            oldImagePath: $this->getCategoryOldImagePath($this->category->image)
        ) ??  $this->category->image;


        return $this->category->save();
    }

    public function update($request, $category_id)
    {
        $this->category = $this->find($category_id);

        $this->save($request);


        return $this->category;
    }
    public function destroy($category_id)
    {
        $category = $this->find($category_id);

        $category->delete();

        FileUpload::deleteImage($this->getCategoryOldImagePath($category->image));
    }

    private function getParentCategory($parent_id)
    {

        $parentCategory =   $this->category::query()
            ->select('parents_ids', 'url', 'id')
            ->find($parent_id);

        $parents_ids = $parentCategory['parents_ids'];
        $parents_ids[] = $parentCategory['id'];

        return ['parents_ids' => $parents_ids, 'url' => $parentCategory['url']];
    }


    private function isCategoryDoesntHaveParentId($parent_id)
    {
        return is_null($parent_id) || empty($parent_id);
    }

    private function getCategoryOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}
