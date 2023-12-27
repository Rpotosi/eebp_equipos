<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_vehiculo', function (Blueprint $table) {
            $table->bigInteger('id_vehiculo', true);
            $table->date('fecha')->nullable();
            $table->string('placa', 50)->nullable();
            $table->string('linea', 50)->nullable();
            $table->string('clase', 50)->nullable();
            $table->string('marca', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('chasis', 50)->nullable();
            $table->string('motor', 50)->nullable();
            $table->string('cilindraje', 50)->nullable();
            $table->string('uso_vehiculo', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->date('fecha_tecnomecanica');
            $table->string('licencia', 50)->nullable();
            $table->string('tipo_direccion', 50)->nullable();
            $table->string('tipo_transmision', 150)->nullable();
            $table->string('numero_velocidades')->nullable();
            $table->string('tipo_rodamiento')->nullable();
            $table->string('suspencion_delantera', 150)->nullable();
            $table->string('suspension_trasera', 150)->nullable();
            $table->string('numero_llantas', 150)->nullable();
            $table->string('dimensiones_rines', 150)->nullable();
            $table->string('material_rines', 150)->nullable();
            $table->string('tipo_frenos_delanteros', 50)->nullable();
            $table->string('tipo_frenos_traseros', 50)->nullable();
            $table->string('numero_serie', 50)->nullable();
            $table->string('numero_ventanas', 50)->nullable();
            $table->string('capacidad_carga', 50)->nullable();
            $table->string('dotacion', 255)->nullable();
            $table->string('equipo_carretera',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_vehiculo');
    }
};
