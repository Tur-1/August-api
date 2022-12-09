<?php

namespace App\Modules\Categories\Repository;

use Illuminate\Support\Str;
use App\Modules\Categories\Models\Category;
use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\Storage;

class CategoryRepository
{
    use ImageUpload;

    private $category;
    private $imageFolder = 'categories';
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getSections()
    {
        return $this->category->sections()->get();
    }
    public function getAllCategories($records)
    {
        return $this->category->withSection()->paginate($records);
    }
    public function getCategoriesBySection($section_id)
    {
        return  $this->category::tree()
            ->where('id', $section_id)
            ->first()['children'];
    }

    public function save($validatedRequest)
    {


        // if there is no parent id , the section id will be the parent for category

        if ($this->isRequestHasNotPrentId($validatedRequest['parent_id'])) {
            $parentId = $validatedRequest['section_id'];
        } else {
            $parentId = $validatedRequest['parent_id'];
        }

        $parentCategory = $this->getParentCategory($parentId);

        $this->category->parents_ids =  $parentCategory['ids'];
        $this->category->section_id = $validatedRequest['section_id'];
        $this->category->parent_id = $parentId;
        $this->category->name = $validatedRequest['name'];
        $this->category->slug =  $parentCategory['slug'];


        if ($validatedRequest->hasFile('image')) {

            $this->deletePreviousImage($this->getCategoryOldImagePath($this->category));
            $this->category->image =   $this->uploadImageAsWebp($validatedRequest->file('image'),  $this->imageFolder);
        }



        $this->category->save();
    }
    public function saveSection($validatedRequest)
    {



        $this->category->name = $validatedRequest['name'];
        $this->category->slug =  $validatedRequest['name'];
        $this->category->is_section = true;

        if ($validatedRequest->hasFile('image')) {
            $this->deletePreviousImage($this->getCategoryOldImagePath($this->category));
            $this->category->image =   $this->uploadImageAsWebp($validatedRequest->file('image'),  $this->imageFolder);
        }

        $this->category->save();
    }
    public function getCategoryOldImagePath($category)
    {
        return $this->imageFolder . '/' . $category->image;
    }
    public function find($category_id)
    {
        return $this->category->find($category_id);
    }
    public function updateSection($validatedRequest, $category_id)
    {
        $this->category = $this->find($category_id);

        $this->saveSection($validatedRequest);

        return  $this->category;
    }
    public function update($validatedRequest, $category_id)
    {
        $this->category = $this->find($category_id);

        $this->category =  $this->save($validatedRequest);

        return  $this->category;
    }

    public function destroy($category_id)
    {
        return $this->category->where('id', $category_id)->delete();
    }

    private function getParentCategory($parentId)
    {
        $parentCategory = Category::where("id",  $parentId)->first();

        $ids = $parentCategory['parents_ids'] ?? [intval($parentId)];

        $ids[] = $parentCategory['id'];


        return ['ids' => array_unique($ids), 'slug' => $parentCategory['slug']];
    }
    private function isRequestHasNotPrentId($parent_id)
    {
        return is_null($parent_id) || empty($parent_id);
    }
}