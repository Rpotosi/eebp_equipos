<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministrativoController;


use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('home', 'show')->name('home.show'); // la ruta get es para mostrar la vista de home, el primer home unico para la URL y show es el metodo del controller, name(home.show) es el home vista y show del metodo del controller
});

Route::controller(AdministrativoController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('administrativo', 'form')->name('administrativo.form'); 
    Route::get('show', 'show')->name('show.show');
    Route::get('vehiculo', 'create_vehiculo')->name('vehiculo.create_vehiculo'); // vehiculo= nombre unico para URL || create_vehiculo= nombre del metodo del controlador || vehiculo.create_vehiculo= URL + Nombre del metodo controlador
    Route::post('vehiculo', 'store_vehiculo')->name('vehiculo.create_vehiculo'); 

    Route::get('equipo', 'create_equipo')->name('equipo.create_equipo'); 
    Route::post('equipo', 'store_equipo')->name('equipo.create_equipo'); 
   


});