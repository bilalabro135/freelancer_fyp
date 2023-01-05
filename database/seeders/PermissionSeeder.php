<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'students-list',
            'students-create',
            'students-edit',
            'students-delete',

            'challan-list',
            'challan-create',
            'challan-edit',
            'challan-delete'

         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}
