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
    Schema::create('create_equipo_dis_seccionador', function (Blueprint $table) {
        $table->bigInteger('id_equipo_sec', true);
        $table->string('nombre_activo_sec', 100)->nullable();
        $table->string('area_sec', 100)->nullable();
        $table->string('subestacion_sec', 100)->nullable();
        $table->string('nivel_tension_sec', 100)->nullable();
        $table->string('bahia_sec', 100)->nullable();
        $table->string('iua_sec', 100)->nullable();
        $table->string('fabricante_sec', 100)->nullable();
        $table->string('costo_adquisicion_sec', 100)->nullable();
        $table->date('fecha_puesta_servicio_sec')->nullable();
        $table->string('pais_origen_sec', 100)->nullable();
        $table->string('img_sec', 255)->nullable();
        // Especificaciones
        $table->string('nombre_equipo_sec', 100)->nullable();
        $table->string('modelo_fabricacion_sec', 100)->nullable();
        $table->string('nro_serie_fabricacion_sec', 100)->nullable();
        $table->date('fecha_fabricacion_sec')->nullable();
        $table->string('volt_aislto_nominal_sec', 100)->nullable();
        $table->string('frecuencia_nominal_sec', 100)->nullable();
        $table->string('volt_impulso_sec', 100)->nullable();
        $table->string('corrt_nominal_sec', 100)->nullable();
        $table->string('corrt_termica_sec', 100)->nullable();
        $table->string('peso_sec', 100)->nullable();
        // Mando Motor
        $table->string('accionamiento_clase_sec', 100)->nullable();
        $table->string('accionamiento_tipo_sec', 100)->nullable();
        $table->string('año_fabricacion_sec', 100)->nullable();
        $table->string('peso_mando_motor_sec', 100)->nullable();
        $table->string('volt_mando_sec', 100)->nullable();
        $table->string('volt_motor_sec', 100)->nullable();
        $table->string('volt_calefaccion_sec', 100)->nullable();
        $table->string('corrt_nominal_mando_sec',100)->nullable();
        $table->string('altura_instalacion_sec', 100)->nullable();
        $table->string('nro_rfe_catalogo_sec', 100)->nullable();
        $table->string('par_total_sec', 100)->nullable();
         //Mando cuchuilla
        $table->string('accionamiento_clase_cuchuilla_sec', 100)->nullable();
        $table->string('accionamiento_tipo_cuchuilla_sec', 100)->nullable();
        $table->string('año_fabricacion_cuchuilla_sec', 100)->nullable();
        $table->string('peso_mando_motor_cuchuilla_sec', 100)->nullable();
        $table->string('volt_mando_cuchuilla_sec', 100)->nullable();
        $table->string('volt_motor_cuchuilla_sec', 100)->nullable();
        $table->string('volt_calefaccion_cuchuilla_sec', 100)->nullable();
        $table->string('altura_instalacion_cuchuilla_sec', 100)->nullable();
        $table->string('nro_rfe_catalogo_cuchuilla_sec', 100)->nullable();
        $table->string('par_total_cuchuilla_sec', 100)->nullable();
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
        Schema::dropIfExists('create_equipo_dis_seccionador');
    }
};
