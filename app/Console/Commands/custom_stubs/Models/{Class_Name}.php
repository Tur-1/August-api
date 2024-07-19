<?php

namespace {namespace};

use {ModulePath}\EloquentBuilders\{Model}Builder;
use {ModulePath}\Traits\{Model}Trait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use {ModulePath}\Database\factories\{Model}Factory;

class {Model} extends Model
{
    use HasFactory;
    use {Model}Trait;

    protected $fillable = [];
    
    public function newEloquentBuilder($query): {Model}Builder
    {
        return new {Model}Builder($query);
    }
     /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return {Model}Factory::new();
    }
}