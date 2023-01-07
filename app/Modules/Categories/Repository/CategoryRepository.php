<?php

namespace App\Modules\Categories\Repository;

use App\Traits\ImageUpload;
use Illuminate\Support\Str;
use App\Modules\Categories\Models\Category;

class CategoryRepository
{
    use ImageUpload;

    private $imageFolder = 'categories';

    public function getSections()
    {
        return Category::where('is_section', true)->has('products')->get();
    }
    public function getCategoryWithChildren()
    {
        return Category::sections()->get();
    }
    public function getCategoriesTree()
    {
        return Category::tree();
    }

    public function getSectionsWithCategories()
    {
        return Category::hasProducts()->where('is_section', true);
    }


    public function getAllSectionsWithCategories($records)
    {
        return Category::withSection()
            ->orderBySection()
            ->paginate($records);
    }

    public function getCategoriesBySection($section_id)
    {
        return Category::tree()
            ->where('id', $section_id)
            ->first()['children'];
    }

    public function getCategory($category_id)
    {
        return Category::find($category_id);
    }

    public function saveSection($validatedRequest, Category $category = null)
    {
        if (is_null($category)) {
            $category = new Category();
        }

        $category->name = $validatedRequest['name'];
        $category->slug = Str::slug($validatedRequest['name'], '_');
        $category->is_section = true;

        if ($validatedRequest->hasFile('image')) {
            $this->deletePreviousImage($this->getCategoryOldImagePath($category->image));
            $category->image = $this->uploadImage($validatedRequest->file('image'), $this->imageFolder);
        }

        $category->save();
    }

    public function saveCategory($validatedRequest, Category $category = null)
    {
        if (is_null($category)) {
            $category = new Category();
        }

        // if there is no parent id , the section id will be the parent for category
        if ($this->isRequestDoesntHaveParentId($validatedRequest['parent_id'])) {
            $parentId = $validatedRequest['section_id'];
        } else {
            $parentId = $validatedRequest['parent_id'];
        }

        $parentCategory = $this->getParentCategory($parentId);

        $category->parents_ids = $parentCategory['ids'];
        $category->section_id = $validatedRequest['section_id'];
        $category->parent_id = $parentId;
        $category->slug = $parentCategory['slug'] . '-' . Str::slug($validatedRequest['name'], '_');

        $category->name = $validatedRequest['name'];

        if ($validatedRequest->hasFile('image')) {
            $this->deletePreviousImage($this->getCategoryOldImagePath($category->image));
            $category->image = $this->uploadImage($validatedRequest->file('image'), $this->imageFolder);
        }

        return $category->save();
    }

    public function destroyCategory($category_id)
    {
        $category = $this->getCategory($category_id);

        $this->destroyModelWithImage($category, $this->getCategoryOldImagePath($category->image));
    }

    private function getParentCategory($parentId)
    {
        $parentCategory = Category::where('id', $parentId)->first();

        $ids = $parentCategory['parents_ids'] ?? [intval($parentId)];

        $ids[] = $parentCategory['id'];

        return ['ids' => array_unique($ids), 'slug' => $parentCategory['slug']];
    }

    private function isRequestDoesntHaveParentId($parent_id)
    {
        return is_null($parent_id) || empty($parent_id);
    }

    private function getCategoryOldImagePath($image)
    {
        return $this->imageFolder . '/' . $image;
    }
}