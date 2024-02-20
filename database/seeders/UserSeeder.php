<?php
namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user           = User::create([
        	'name'      => 'admin', 
        	'email'     => 'admin@gmail.com',
        	'password'  => Hash::make('rootroot')
        ]);

        $roles_defined = [
            'Super-Admin',
            '3D Designer',
            '3D Vendor',
            'User'
        ];

        foreach($roles_defined as $roles_single){
            $role_add = Role::create(['name' => $roles_single]);
        }
        
        $role = Role::where('name','Super-Admin')->where('id',1)->first();
        $permissions    = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
