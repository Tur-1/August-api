<?php

namespace App\Modules\Admins\Database\seeders;


use Illuminate\Database\Seeder;
use App\Modules\Admins\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::factory(60)->create();
    }
}
