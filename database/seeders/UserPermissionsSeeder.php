<?php

namespace Database\Seeders;

use App\Modules\Roles\Models\Permission;
use App\Modules\Roles\Models\Role;
use App\Modules\Users\Models\User;
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
        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => 123456, 'role_id' => $role->id]);

        foreach (Permission::all() as $permission) {
            $user_permissions[] = [
                'user_id' => 1,
                'permission_id' => $permission->id,

            ];
        }

        DB::table('user_permission')->insert($user_permissions);
    }
}