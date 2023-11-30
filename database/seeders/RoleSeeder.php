<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'administrativo']);
        $role2 = Role::create(['name' => 'sst']);
        $role3 = Role::create(['name' => 'distribucion']);
        $role4 = Role::create(['name' => 'sistemas']);


        Permission::create(['name' => 'home.show'])->syncRoles([$role1,$role2,$role3,$role4]);
      
        Permission::create(['name' => 'administrativo.form.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'show.show.administrativo'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'show-vehiculo-CV_vehiculos_CV.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'vehiculo.edit_vehiculo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'vehiculo.mantenimiento_vehiculo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'vehiculo.create_vehiculo.administrativo'])->syncRoles([$role1]);


        Permission::create(['name' => 'show-equipo-CV_equipo_CV.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'equipo.equipo.create_equipo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'equipo.create_equipo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'equipo.mantenimiento_equipo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'show-equipo.show_equipo.administrativo'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrativo.edit_equipo.administrativo'])->syncRoles([$role1]);


    }
}
