<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            "brands",
            "banners",
            "users",
            "customers",
            "roles",
            "categories",
            "products",
            "colors",
            "size options",
            "reviews",
            "coupons",
            "orders",
            "orders status",
            "dashboard"
        ];


        $permissions = [];

        foreach ($pages as $key => $value) {
            $permissions[] = [
                'name' => Str::title('create ' . $value),
                'slug' => Str::slug('create-' . $value),
                'page_name' => $value

            ];
            $permissions[] = [
                'name' => Str::title('update ' . $value),
                'slug' => Str::slug('update-' . $value),
                'page_name' => $value
            ];
            $permissions[] = [
                'name' => Str::title('view ' . $value),
                'slug' => Str::slug('view-' . $value),
                'page_name' => $value
            ];
            $permissions[] = [
                'name' => Str::title('access ' . $value),
                'slug' => Str::slug('access-' . $value),
                'page_name' => $value
            ];
            $permissions[] = [
                'name' => Str::title('delete ' . $value),
                'slug' => Str::slug('delete-' . $value),
                'page_name' => $value
            ];
        }



        DB::table('permissions')->insert($permissions);
    }
}