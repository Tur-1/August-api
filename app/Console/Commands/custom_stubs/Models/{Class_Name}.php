 <?php

namespace {namespace};

use {ModulePath}\EloquentBuilders\{Model}Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class {Model} extends Model
{
    use HasFactory;


    public function newEloquentBuilder($query): {Model}Builder
    {
        return new {Model}Builder($query);
    }

}