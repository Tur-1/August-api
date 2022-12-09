<?php

namespace App\Modules\Categories\Models;

use App\Modules\Categories\EloquentBuilders\CategoryBuilder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $appends = ['image_url'];
    protected $casts = [
        'parents_ids' => 'array',
        'is_section' => 'boolean',
        'is_active' => 'boolean'

    ];

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }
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


    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/categories/' . $this->image) : null,
        );
    }
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value . '-' . Str::slug($this->name, '_'),
        );
    }
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Str::title($value),
        );
    }
    public function section()
    {
        return  $this->belongsTo(Category::class, 'section_id')->select('id', 'name');
    }
}