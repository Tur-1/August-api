<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Path to the module seeders
        $modulesPath = base_path('app\\Modules');

        // Get all module directories
        $modules = File::directories($modulesPath);

        foreach ($modules as $module) {
            // Check if there is a seeders directory in the module
            $seedersPath = $module . '\\Database\\Seeders';

            if (File::exists($seedersPath)) {
                // Get all seeder files
                $seeders = File::files($seedersPath);

                foreach ($seeders as $seeder) {
                    $seederClass = 'App\\Modules\\' . basename($module) . '\\Database\\Seeders\\' . pathinfo($seeder, PATHINFO_FILENAME);

                    if (class_exists($seederClass)) {
                        $this->call($seederClass);
                    }
                }
            }
        }
    }
}
