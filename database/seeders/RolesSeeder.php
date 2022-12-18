<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => Str::title('admin'),
                'slug' => Str::slug('admin'),

            ], [
                'name' => Str::title('content editor'),
                'slug' => Str::slug('content editor'),

            ],
        ];





        DB::table('roles')->insert($roles);
    }
}