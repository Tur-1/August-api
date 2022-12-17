<?php

namespace {namespace};

use {ModulePath}\EloquentBuilders\{Model}Builder;
use {ModulePath}\Traits\{Model}Trait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class {Model} extends Model
{
    use HasFactory;
    use {Model}Trait;

    protected $fillable = [];
    
    public function newEloquentBuilder($query): {Model}Builder
    {
        return new {Model}Builder($query);
    }

}