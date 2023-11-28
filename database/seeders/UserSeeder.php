<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Usuario Administrador_Sistemas
         User::create([
            'email'=>'sistemas@eebpsa.com.co',
            'username'=>'Sistemas',
            'password'=>'eebp2024*'
        ])->assignRole('Sistemas');

        //Usuario SST
        User::create([
            'email'=>'sst@eebpsa.com.co',
            'username'=>'Profesional SST',
            'password'=>'eebp2024*'
        ])->assignRole('SST');

        //Usuario Distribucion
        User::create([
            'email'=>'operaciones@eebpsa.com.co',
            'username'=>'Analista Operaciones',
            'password'=>'eebp2024*'
        ])->assignRole('Distribucion');

        //Usuario Jefe administrativo
        User::create([
            'email'=>'administrativo@eebpsa.com.co',
            'username'=>'Jefe Administrativo',
            'password'=>'eebp2024*'
        ])->assignRole('Administrativo');
    }
}
