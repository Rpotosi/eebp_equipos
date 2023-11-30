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
            'username'=>'sistemas@eebpsa.com.co',
            'password'=>'eebp2024*'
        ])->assignRole('sistemas');

        //Usuario SST
        User::create([
            'email'=>'sst@eebpsa.com.co',
            'username'=>'sst@eebpsa.com.co',
            'password'=>'eebp2024*'
        ])->assignRole('sst');

        //Usuario Distribucion
        User::create([
            'email'=>'operaciones@eebpsa.com.co',
            'username'=>'operaciones@eebpsa.com.co',
            'password'=>'eebp2024*'
        ])->assignRole('distribucion');

        //Usuario Jefe administrativo
        User::create([
            'email'=>'administrativo@eebpsa.com.co',
            'username'=>'administrativo@eebpsa.com.co',
            'password'=>'eebp2024*'
        ])->assignRole('administrativo');
    }
}
