<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermiossionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();
        $data = [
            ['name'=>'read_dashboard', 'guard_name'=>'web'],

            ['name'=>'create_user', 'guard_name'=>'web'],
            ['name'=>'read_user','guard_name'=>'web'],
            ['name'=>'update_user','guard_name'=>'web'],
            ['name'=>'delete_user','guard_name'=>'web'],

            ['name'=>'create_role', 'guard_name'=>'web'],
            ['name'=>'read_role','guard_name'=>'web'],
            ['name'=>'update_role','guard_name'=>'web'],
            ['name'=>'delete_role','guard_name'=>'web'],

            ['name'=>'create_instance', 'guard_name'=>'web'],
            ['name'=>'read_instance','guard_name'=>'web'],
            ['name'=>'update_instance','guard_name'=>'web'],
            ['name'=>'delete_instance','guard_name'=>'web'],

            ['name'=>'create_guest', 'guard_name'=>'web'],
            ['name'=>'read_guest','guard_name'=>'web'],
            ['name'=>'update_guest','guard_name'=>'web'],
            ['name'=>'delete_guest','guard_name'=>'web'],

            ['name'=>'read_permission','guard_name'=>'web'],

            ['name'=>'create_scan_qr','guard_name'=>'web'],
            ['name'=>'read_scan_qr','guard_name'=>'web'],
            ['name'=>'delete_scan_qr','guard_name'=>'web'],
        ];

        DB::table('permissions')->insert($data);
        // this can be done as separate statements
        DB::table('roles')->delete();
        $role1 = Role::create(['name' => 'Superadmin']);
        $role1->givePermissionTo(Permission::all());

    }
}
