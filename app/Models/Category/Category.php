<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;


    protected $appends = ['image_url'];
    protected $casts = [
        'parents_ids' => 'array',
        'is_section' => 'boolean',
        'is_active' => 'boolean'

    ];

    public static function tree()
    {

        $allCategories =  Category::get();

        $sections =  $allCategories->where('is_section', 1);

        self::formatTree($sections, $allCategories);
        return $allCategories;
    }
    public static function formatTree($sections, $allCategories)
    {
        foreach ($sections as $key => $section) {

            $section['children'] =  $allCategories->where('parent_id', $section['id'])->values();

            if (!empty($section['children'])) {
                self::formatTree($section['children'], $allCategories);
            }
        }
    }

    public function getImageUrlAttribute()
    {

        return $this->image ? Storage::get('images/categories/' . $this->image) : null;
    }

    public function section()
    {
        return  $this->belongsTo(Category::class, 'section_id')->select('id', 'name');
    }
}