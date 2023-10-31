<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\SSTController;
use App\Http\Controllers\DistribucionController;


use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('home', 'show')->name('home.show'); // la ruta get es para mostrar la vista de home, el primer home unico para la URL y show es el metodo del controller, name(home.show) es el home vista y show del metodo del controller
});

Route::controller(AdministrativoController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('administrativo', 'form')->name('administrativo.form'); 
    Route::get('show-vehiculo', 'show_vehiculo')->name('show.show');
    Route::get('update-vehiculo/{id_vehiculo}', 'edit_vehiculo')->name('vehiculo.create_vehiculo');
    Route::get('vehiculo', 'create_vehiculo')->name('vehiculo.create_vehiculo'); // vehiculo= nombre unico para URL || create_vehiculo= nombre del metodo del controlador || vehiculo.create_vehiculo= URL + Nombre del metodo controlador
    Route::post('vehiculo', 'store_vehiculo')->name('vehiculo.create_vehiculo'); 

    Route::get('equipo', 'create_equipo')->name('equipo.create_equipo'); 
    Route::post('equipo', 'store_equipo')->name('equipo.create_equipo'); 
    Route::get('show-equipo', 'show_equipo')->name('show-equipo.show_equipo');
    Route::get('update-vehiculo/{id_vehiculo}', 'edit_vehiculo')->name('vehiculo.create_vehiculo');
   
});


Route::controller(SSTController::class)->group(function(){
    Route::get('SST', 'form')->name('SST.form');
    Route::get('equipo_sst','create_equipo')->name('equipo_sst.create_equipo');
    Route::post('equipo_sst', 'store_equipo')->name('equipo_sst.create_equipo');
    Route::get('show-equipo-sst', 'show_equipo')->name('show-equipo-sst.show_equipo');
});


Route::controller(DistribucionController::class)->group(function(){
    Route::get('distribucion', 'form')->name('SST.form');
    Route::get('distribucion_equipo','create_equipo')->name('distribucion_equipo.create_equipo');
    Route::post('distribucion_equipo', 'store_equipo')->name('distribucion_equipo.create_equipo');
    Route::get('show-equipo-dis', 'show_equipo')->name('show-equipo-dis.show_equipo');
});