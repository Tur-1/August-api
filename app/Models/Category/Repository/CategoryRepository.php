<?php

namespace App\Models\Category\Repository;

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

    public function store($validatedRequest)
    {
        return $this->category->create($validatedRequest);
    }
    public function find($category_id)
    {
        return $this->category->find($category_id);
    }
    public function update($validatedRequest, $category_id)
    {
        $category = $this->find($category_id);
        $category->update($validatedRequest);
        return  $category;
    }

    public function destroy($category_id)
    {
        return $this->category->where('id', $category_id)->delete();
    }
}