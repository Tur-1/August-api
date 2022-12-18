<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // first insert roles 
        $this->call(RolesSeeder::class);

        // insert Permissions 
        $this->call(PermissionsSeeder::class);

        // attach role Permissions
        $this->call(RolePermissionsSeeder::class);

        // attach user Permissions
        $this->call(UserPermissionsSeeder::class);
    }
}