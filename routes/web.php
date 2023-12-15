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

/*
Route::middleware(['auth'])->group(function () {   // esta linea es para proteger las rutas
});
*/

Route::controller(LoginController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/login', 'show')->name('login'); // la ruta get es para mostrar la vista de login
    Route::post('/login', 'login')->name('login');// la ruta post es para acceder al metodo del controlador para autenticarse
});



Route::controller(LogoutController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/logout', 'logout')->name('logout.logout');// la ruta post es para acceder al metodo del controlador para autenticarse
});


Route::middleware(['auth'])->group(function () {
Route::controller(RegisterController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador login
    Route::get('/register', 'show')->name('register.show'); // la ruta get es para mostrar la vista de login
    Route::post('/register', 'register_create')->name('register.register_create'); // la ruta get es para mostrar la vista de login
});
});


Route::middleware(['auth'])->group(function () {
Route::controller(HomeController::class)->group(function(){   //asi se define un grupo de rutas para login para el controlador Home
    Route::get('home', 'show')->name('home.show'); // la ruta get es para mostrar la vista de home, el primer home unico para la URL y show es el metodo del controller, name(home.show) es el home vista y show del metodo del controller
});
});

Route::middleware(['auth'])->group(function () {
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
});


Route::middleware(['auth'])->group(function () {
Route::controller(DistribucionController::class)->group(function(){
    Route::get('dis-show-form', 'show_form')->name('distribucion.show_form');
    Route::get('dis-show-equipo', 'show_equipo')->name('distribucion.show_equipo');
    Route::get('dis-show-equipo-CV/{id_equipo}', 'show_equipo_CV')->name('distribucion.show_equipo_CV');
    Route::get('dis-create-equipo','create_equipo')->name('distribucion.create_equipo');
    Route::post('dis-create-equipo', 'store_equipo')->name('distribucion.store_equipo');
    Route::get('dis-create-mantenimiento-equipo/{id_equipo}', 'create_mantenimiento_equipo')->name('distribucion.create_mantenimiento_equipo');
    Route::post('dis-create-mantenimiento-equipo/{id_equipo}', 'store_mantenimiento_equipo')->name('distribucion.store_mantenimiento_equipo');
});
});


Route::middleware(['auth'])->group(function () {
Route::controller(SSTController::class)->group(function(){
    Route::get('sst-show-form', 'show_form')->name('sst.show_form');
    Route::get('sst-show-equipo', 'show_equipo')->name('sst.show_equipo');
    Route::get('sst-show-equipo-CV/{id_equipo}', 'show_equipo_CV')->name('sst.show_equipo_CV');
    Route::get('sst-create-equipo','create_equipo')->name('sst.create_equipo');
    Route::post('sst-create-equipo', 'store_equipo')->name('sst.store_equipo');
    Route::get('sst-create-mantenimiento-equipo/{id_equipo}', 'create_mantenimiento_equipo')->name('sst.create_mantenimiento_equipo');
    Route::post('sst-create-mantenimiento-equipo/{id_equipo}', 'store_mantenimiento_equipo')->name('sst.store_mantenimiento_equipo');
});
});
