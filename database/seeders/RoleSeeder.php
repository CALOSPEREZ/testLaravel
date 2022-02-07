<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleEmpleado = Role::create(['name' => 'Empleado']);
        Permission::create(['name' => 'accounts', 'description' => 'Accounts user'])->assignRole($roleEmpleado);
        Permission::create(['name' => 'order', 'description' => 'order user'])->assignRole($roleEmpleado);
       
    }
}
