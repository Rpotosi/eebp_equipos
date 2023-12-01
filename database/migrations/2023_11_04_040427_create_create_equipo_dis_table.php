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
        Schema::create('create_equipo_dis', function (Blueprint $table) {
            $table->bigInteger('id_equipo', true);
            $table->string('nombre_equipo', 100)->nullable();
            $table->string('ubicacion_equipo', 100)->nullable();
            $table->string('estado', 50)->nullable();
            $table->date('fecha_fabrica');
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('no_serie', 50)->nullable();
            $table->string('no_lote', 50)->nullable();
            $table->string('no_activo', 50)->nullable();
            $table->string('iua_creg', 50)->nullable();
            $table->string('codigo', 50)->nullable();
            $table->date('fecha_ensayo')->nullable();
            $table->string('validez', 50)->nullable();
            $table->date('fecha_conformidad');
            $table->date('fecha_operacion');
            $table->string('propiedad', 50)->nullable();
            $table->string('nombre_responsable', 50)->nullable();
            $table->string('cargo', 50)->nullable();
            $table->string('lugar_proceso', 50)->nullable();
            $table->date('fecha_entrega');
            $table->string('observacion_responsable',100)->nullable();
            $table->string('fabricante', 50)->nullable();
            $table->date('fecha_adquisicion');
            $table->string('nombre_proveedor', 50)->nullable();
            $table->string('direccion_proveedor', 50)->nullable();
            $table->string('email_proveedor', 50)->nullable();
            $table->string('telefono_proveedor', 50)->nullable();
            $table->string('catalogo', 50)->nullable();
            $table->string('mantenimiento_recomendado',100)->nullable();
            $table->string('condiciones_operacion', 50)->nullable();
            $table->string('observacion_fabricante', 50)->nullable();
            $table->string('medicion', 50)->nullable();
            $table->string('rango_uso',50)->nullable();
            $table->string('resolucion', 150)->nullable();
            $table->string('exactitud', 150)->nullable();
            $table->string('fecha_calibracion');
            $table->string('fecha_verificacion');
            $table->string('patrones', 50)->nullable();
            $table->string('estandares', 150)->nullable();
            $table->string('regulaciones', 150)->nullable();
            $table->string('otras_caracteristicas', 100)->nullable();
            $table->string('garantia', 50)->nullable();
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('protecciones', 100)->nullable();
            $table->string('nucleo_1', 50)->nullable();
            $table->string('nucleo_2', 50)->nullable();
            $table->string('nucleo_3', 50)->nullable();
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
        Schema::dropIfExists('create_equipo_dis');
    }
};
