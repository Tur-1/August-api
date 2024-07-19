<?php
namespace {namespace};

use {ModulePath}\Models\{Model};
use Illuminate\Database\Seeder;
 
class {Model}Seeder extends Seeder
{
    public function run()
    {
        {Model}::factory(60)->create();
    }
}