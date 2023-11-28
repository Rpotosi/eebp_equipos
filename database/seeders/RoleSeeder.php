<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrativo']);
        $role2 = Role::create(['name' => 'SST']);
        $role3 = Role::create(['name' => 'Distribucion']);
        $role4 = Role::create(['name' => 'Sistemas']);


        Permission::create(['name' => 'home.show'])->syncRoles([$role1,$role4]);
      
       Permission::create(['name' => 'administrativo.form'])->syncRoles([$role1]);
       Permission::create(['name' => 'show.show'])->syncRoles([$role1]);
       Permission::create(['name' => 'show-vehiculo-CV_vehiculos_CV'])->syncRoles([$role1]);
       Permission::create(['name' => 'vehiculo.edit_vehiculo'])->syncRoles([$role1]);
       Permission::create(['name' => 'vehiculo.mantenimiento_vehiculo'])->syncRoles([$role1]);
       Permission::create(['name' => 'vehiculo.create_vehiculo'])->syncRoles([$role1]);


       Permission::create(['name' => 'show-equipo-CV_equipo_CV'])->syncRoles([$role1]);
       Permission::create(['name' => 'equipo.equipo.create_equipo'])->syncRoles([$role1]);
       Permission::create(['name' => 'equipo.create_equipo'])->syncRoles([$role1]);
       Permission::create(['name' => 'equipo.mantenimiento_equipo'])->syncRoles([$role1]);
       Permission::create(['name' => 'show-equipo.show_equipo'])->syncRoles([$role1]);
       Permission::create(['name' => 'administrativo.edit_equipo'])->syncRoles([$role1]);







    }
}
