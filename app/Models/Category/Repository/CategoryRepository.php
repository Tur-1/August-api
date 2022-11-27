<?php

namespace App\Models\Category\Repository;

use Illuminate\Support\Str;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function geSectionsWithCategories()
    {
        return $this->category::tree()->where("is_section", true);
    }
    public function getAllCategories($records)
    {
        return $this->category->with('section')->paginate($records);
    }
    public function getCategoriesBySection($section_id)
    {
        return  $this->category::tree()->where("is_section", true)->where('id', $section_id)->first()['children'];
    }
    public function store($validatedRequest)
    {
        return $this->category->create($validatedRequest);
    }
    public function save($validatedRequest)
    {

        if (is_null($validatedRequest['category_id']) || empty($validatedRequest['category_id'])) {
            $parentId = $validatedRequest['section_id'];
        } else {

            $parentId = $validatedRequest['category_id'];
        }

        $parentCategory = Category::where("id",  $parentId)->first();
        $ids = $parentCategory['parents_ids'] ?? [intval($parentId)];

        $ids[] = $parentCategory['id'];


        $categorySlug = $parentCategory['slug'];

        $this->category->parents_ids = array_unique($ids);
        $this->category->section_id = $validatedRequest['section_id'];
        $this->category->parent_id = $parentId;
        $this->category->name = Str::title($validatedRequest['name']);
        $this->category->slug =  $categorySlug . '-' . Str::slug($validatedRequest['name'], '_');

        if ($validatedRequest->hasFile('image')) {
            $this->category->image =  $validatedRequest->image->getClientOriginalName();
        }

        return $this->category->save();
    }
    public function find($category_id)
    {
        return $this->category->find($this->category_id);
    }
    public function update($validatedRequest, $category_id)
    {
        $this->category = $this->find($category_id);
        $this->category->update($validatedRequest);
        return  $this->category;
    }

    public function destroy($category_id)
    {
        return $this->category->where('id', $category_id)->delete();
    }
}