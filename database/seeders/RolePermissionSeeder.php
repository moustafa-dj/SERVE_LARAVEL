<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Config;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name'=>'admin' , 'guard_name'=>'admin']);
        $client = Role::firstOrCreate(['name'=>'client' , 'guard_name'=>'web']);
        $employee = Role::firstOrCreate(['name'=>'employee' , 'guard_name'=>'employee']);

        $this->command->info('##### roles had been created');

        $admin_permissions = config::get('permission.admin_permissions');

        foreach($admin_permissions as $permission){

            foreach($permission['permissions'] as $p){

                $per = Permission::firstOrCreate(['name'=>$p , 'guard_name'=>'admin']);

                $this->command->info('##### permission '.$per->name .' has been created');

                $admin->givePermissionTo($per);

                $this->command->info('##### permission '.$per->name .' has been created assigned to the role '.$admin->name);
            }
        }

    }
}
