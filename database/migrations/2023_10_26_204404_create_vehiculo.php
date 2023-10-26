<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id_orden', true);
            $table->date('fecha')->nullable();
            $table->string('placa', 50)->nullable();
            $table->string('linea', 50)->nullable();
            $table->string('clase', 50)->nullable();
            $table->string('marca', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('chasis',50)->nullable();
            $table->string('motor', 50)->nullable();
            $table->string('cilindraje',50)->nullable();
            $table->string('uso_vehiculo', 50)->nullable();    
            $table->string('modelo', 50)->nullable();
            $table->date('fecha_tecnomecanica');
            $table->string('licencia', 50)->nullable();
            $table->string('tipo_direccion', 50)->nullable();
            $table->string('tipo_transmision', 150)->nullable();
            $table->string('numero_velocidades', 255)->nullable();
            $table->string('tipo_rodamiento', 255)->nullable();
            $table->string('suspencion_delantera', 150)->nullable();
            $table->string('suspension_trasera',150)->nullable();
            $table->string('numero_llantas',150)->nullable();
            $table->string('dimensiones_rines',150)->nullable();
            $table->string('material_rines',150)->nullable(); 
            $table->string('tipo_frenos_delanteros',50)->nullable();
            $table->string('tipo_frenos_traseros',50)->nullable(); 
            $table->string('numero_serie',50)->nullable();
            $table->string('numero_ventanas',50)->nullable();
            $table->string('capacidad_carga',50)->nullable();
            $table->string('dotacion',50) ->nullable();
            $table->string('equipo_carretera')->nullable();
            $table->date('fecha_mantenimiento')->nullable();
            $table->string('descripcion',255)->nullable();
            $table->string('averia_dano',50)->nullable();
            $table->string('referencia_repuesto',150)->nullable();
            $table->string('responsable')->nullable();
            $table->string('precio')->nullable();




            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
