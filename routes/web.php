<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\SSTController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Requests\RegisterRequest;



use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/', 'show')->name('login'); // la ruta get es para mostrar la vista de login
    Route::post('/', 'login')->name('login');// la ruta post es para acceder al metodo del controlador para autenticarse
});

Route::controller(LogoutController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/logout', 'logout')->name('logout.logout');// la ruta post es para acceder al metodo del controlador para autenticarse
});


Route::controller(RegisterController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/register', 'show')->name('register.show'); // la ruta get es para mostrar la vista de login
    Route::post('/register', 'register_create')->name('register.register_create'); // la ruta get es para mostrar la vista de login
   
});

Route::controller(HomeController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('home', 'show')->name('home.show'); // la ruta get es para mostrar la vista de home, el primer home unico para la URL y show es el metodo del controller, name(home.show) es el home vista y show del metodo del controller
});

Route::controller(AdministrativoController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('admin-show-form', 'show_form')->name('administrativo.show_form'); 
    Route::get('admin-show-vehiculo', 'show_vehiculo')->name('administrativo.show_vehiculo');
    Route::get('admin-show-vehiculo-CV/{id_vehiculo}', 'show_vehiculos_CV')->name('administrativo.show_vehiculos_CV');    
    Route::get('admin-create-vehiculo', 'create_vehiculo')->name('administrativo.create_vehiculo'); // vehiculo= nombre unico para URL || create_vehiculo= nombre del metodo del controlador || vehiculo.create_vehiculo= URL + Nombre del metodo controlador
    Route::post('admin-create-vehiculo', 'store_vehiculo')->name('administrativo.store_vehiculo'); 
    Route::get('admin-create-mantenimiento-vehiculo/{id_vehiculo}', 'create_mantenimiento_vehiculo')->name('administrativo.create_mantenimiento_vehiculo');
    Route::post('admin-create-mantenimiento-vehiculo/{id_vehiculo}', 'store_mantenimiento_vehiculo')->name('administrativo.store_mantenimiento_vehiculo');

    Route::get('admin-show-equipo', 'show_equipo')->name('administrativo.show_equipo');
    Route::get('admin-show-equipo-CV/{id_equipo}', 'show_equipo_CV')->name('administrativo.show_equipo_CV');
    Route::get('admin-create-equipo', 'create_equipo')->name('administrativo.create_equipo');
    Route::post('admin-create-equipo', 'store_equipo')->name('administrativo.store_equipo');
    Route::get('admin-create-mantenimiento-equipo/{id_equipo}', 'create_mantenimiento_equipo')->name('administrativo.create_mantenimiento_equipo');
    Route::post('admin-create-mantenimiento-equipo/{id_equipo}', 'store_mantenimiento_equipo')->name('administrativo.store_mantenimiento_equipo');   
});

Route::controller(DistribucionController::class)->group(function(){
    Route::get('dis-show-form', 'show_form')->name('distribucion.show_form');
    Route::get('dis-show-equipo', 'show_equipo')->name('distribucion.show_equipo');
    Route::get('dis-show-equipo-CV/{id_equipo}', 'show_equipo_CV')->name('distribucion.show_equipo_CV');
    Route::get('dis-create-equipo','create_equipo')->name('distribucion.create_equipo');
    Route::post('dis-create-equipo', 'store_equipo')->name('distribucion.store_equipo');
    Route::get('dis-create-mantenimiento-equipo/{id_equipo}', 'create_mantenimiento_equipo')->name('distribucion.create_mantenimiento_equipo');
    Route::post('dis-create-mantenimiento-equipo/{id_equipo}', 'store_mantenimiento_equipo')->name('distribucion.store_mantenimiento_equipo');
    
});


Route::controller(SSTController::class)->group(function(){
    Route::get('SST', 'form')->name('SST.form');
    Route::get('equipo_sst','create_equipo')->name('equipo_sst.create_equipo');
    Route::post('equipo_sst', 'store_equipo')->name('equipo_sst.create_equipo');
    Route::get('show-equipo-sst', 'show_equipo')->name('show-equipo-sst.show_equipo');
    Route::get('update-equipo-sst/{id_equipo}', 'edit_equipo')->name('equipo.edit_equipo');
    Route::post('update-equipo-sst/{id_equipo}', 'agregarMantenimiento_equipo_sst')->name('equipo.mantenimiento_equipo_sst');
    Route::get('show-equipo-sst-CV/{id_equipo}', 'equipo_sst_CV')->name('show-equipo-sst-CV_equipo_sst_CV');
});