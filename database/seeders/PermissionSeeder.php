<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'job-list',
            'job-create',
            'job-edit',
            'job-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'blogs-list',
            'blogs-create',
            'blogs-edit',
            'blogs-delete',

            'payment-methods-list',
            'payment-methods-create',
            'payment-methods-edit',
            'payment-methods-delete',

            'testimonials-list',
            'testimonials-create',
            'testimonials-edit',
            'testimonials-delete',

         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}
