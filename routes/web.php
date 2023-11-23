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
    Route::get('/show-vehiculo-CV{id_vehiculo}', 'vehiculos_CV')->name('show-vehiculo-CV_vehiculos_CV');
    Route::get('update-vehiculo/{id_vehiculo}', 'edit_vehiculo')->name('vehiculo.edit_vehiculo');
    Route::post('update-vehiculo/{id_vehiculo}', 'agregarMantenimiento')->name('vehiculo.mantenimiento_vehiculo');
    Route::get('vehiculo', 'create_vehiculo')->name('vehiculo.create_vehiculo'); // vehiculo= nombre unico para URL || create_vehiculo= nombre del metodo del controlador || vehiculo.create_vehiculo= URL + Nombre del metodo controlador
    Route::post('vehiculo', 'store_vehiculo')->name('vehiculo.create_vehiculo'); 

    Route::get('/show-equipo-CV{id_equipo}', 'equipo_CV')->name('show-equipo-CV_equipo_CV');
    Route::get('equipo', 'create_equipo','create_equipo')->name('equipo.equipo.create_equipo'); 
    Route::post('equipo', 'store_equipo','store_equipo')->name('equipo.create_equipo'); 
    Route::post('update-equipo/{id_equipo}', 'agregarMantenimiento_equipo')->name('equipo.mantenimiento_equipo');
    Route::get('show-equipo', 'show_equipo')->name('show-equipo.show_equipo');
    Route::get('update-equipo/{id_equipo}', 'edit_equipo')->name('equipo.edit_equipo');


   
});



Route::controller(DistribucionController::class)->group(function(){
    Route::get('distribucion', 'form')->name('SST.form');
    Route::get('distribucion_equipo','create_equipo')->name('distribucion.create_equipo');
    Route::post('distribucion_equipo', 'store_equipo')->name('distribucion.create_equipo');
    Route::get('show-equipo-dis', 'show_equipo')->name('distribucion.show_equipo');
    Route::get('update-equipo-dis/{id_equipo}', 'edit_equipo')->name('distribucion.edit_equipo');
    Route::post('update-equipo-dis/{id_equipo}', 'agregarMantenimiento_equipo_dis')->name('equipo.mantenimiento_equipo_dis');
    Route::get('/show-equipo-dis-CV{id_equipo}', 'equipo_dis_CV')->name('show-equipo-dis-CV.equipo_dis_CV');
});

/*

Route::controller(SSTController::class)->group(function(){
    Route::get('SST', 'form')->name('SST.form');
    Route::get('equipo_sst','create_equipo')->name('equipo_sst.create_equipo');
    Route::post('equipo_sst', 'store_equipo')->name('equipo_sst.create_equipo');
    
    Route::get('show-equipo-sst', 'show_equipo')->name('show-equipo-sst.show_equipo');
    Route::get('update-equipo/{id_equipo}', 'edit_equipo')->name('equipo.edit_equipo');
});
*/