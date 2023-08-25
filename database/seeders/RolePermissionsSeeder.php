<?php

namespace Database\Seeders;

use App\Models\user\Permission;
use App\Modules\Roles\Models\Permission as ModelsPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (ModelsPermission::all() as $permission) {
            $role_permissions[] = [
                'role_id' => 1,
                'permission_id' => $permission->id,

            ];
        }


        DB::table('role_permission')->insert($role_permissions);
    }
}
