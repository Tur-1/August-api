<?php

namespace Database\Seeders;

use App\Modules\Admins\Models\Admin;
use App\Modules\Roles\Models\Permission;
use App\Modules\Roles\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        Admin::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => 123456, 'role_id' => $role->id]);

        foreach (Permission::all() as $permission) {
            $user_permissions[] = [
                'admin_id' => 1,
                'permission_id' => $permission->id,

            ];
        }

        DB::table('admin_permission')->insert($user_permissions);
    }
}