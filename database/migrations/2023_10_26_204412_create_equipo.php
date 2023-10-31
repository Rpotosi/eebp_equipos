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
        Schema::create('create_equipo', function (Blueprint $table) { // nombre create_vehiculo = nombre de la migración
            $table->comment('');
            $table->bigInteger('id_equipo', true);
            $table->string('nombre_equipo')->nullable();
            $table->string('ubicacion_equipo', 255)->nullable();
            $table->string('estado',50);
            $table->date('fecha_fabrica');
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('no_serie',50)->nullable();
            $table->string('no_lote',50)->nullable();
            $table->string('no_activo',50)->nullable();
            $table->string('codigo',50)->nullable();
            $table->date('fecha_ensayo', 50)->nullable();
            $table->string('validez', 50)->nullable();
            $table->date('fecha_conformidad');
            $table->date('fecha_operacion');
            $table->string('nombre_responsable',50);
            $table->string('cargo',50)->nullable();
            $table->string('lugar_proceso',50);
            $table->date('fecha_entrega');
            $table->string('observacion_responsable',255);
            $table->string('fabricante',50);
            $table->date('fecha_adquisicion', 50)->nullable();
            $table->string('nombre_proveedor',50)->nullable();
            $table->string('direccion_proveedor', 50)->nullable();    
            $table->string('email_proveedor', 50)->nullable();
            $table->string('telefono_proveedor', 50)->nullable();
            $table->string('catalogo', 50)->nullable();
            $table->string('mantenimiento_recomendado', 50)->nullable();
            $table->string('condiciones_operacion', 50)->nullable();
            $table->string('observacion_fabricante', 50)->nullable();
            $table->string('medicion', 150)->nullable();
            $table->string('rango_uso', 255)->nullable();
            $table->string('resolucion', 150)->nullable();
            $table->string('exactitud',150)->nullable();
            $table->string('fecha_calibracion',150)->nullable();
            $table->string('fecha_verificacion',150)->nullable();
            $table->string('patrones',150)->nullable(); 
            $table->string('estandares',150)->nullable(); 
            $table->string('regulaciones',150)->nullable(); 
            $table->string('otras_caracteristicas',150)->nullable();
            $table->string('garantia', 50)->nullable();
            $table->string('fecha_inicio');
            $table->string('fecha_fin');

            $table->timestamps();  // tiempo de creación

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
