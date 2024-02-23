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
    Schema::create('create_equipo_dis_interruptor', function (Blueprint $table) {
        $table->bigInteger('id_equipo', true);
        $table->string('nombre_interruptor', 100)->nullable();
        $table->string('area', 100)->nullable();
        $table->string('subestacion', 100)->nullable();
        $table->string('nivel_tension', 100)->nullable();
        $table->string('bahia', 100)->nullable();
        $table->string('iua', 100)->nullable();
        $table->string('fabricante', 100)->nullable();
        $table->string('costo_adquisicion', 100)->nullable();
        $table->date('fecha_puesta_servicio')->nullable();
        $table->date('fecha_fabricacion')->nullable();
        $table->string('pais_origen', 100)->nullable();
        $table->string('img_interruptor', 255)->nullable();
        $table->string('nombre_equipo', 100)->nullable();
        $table->string('modelo_fabricacion', 100)->nullable();
        $table->string('nro_serie_fabricacion', 100)->nullable();
        $table->string('voltage_aislamiento_nominal', 100)->nullable();
        $table->string('frecuencia_nominal', 100)->nullable();
        $table->string('voltage_frequencia_indutrial', 100)->nullable();
        $table->string('voltage_impulso', 100)->nullable();
        $table->string('corrientes_nominal', 100)->nullable();
        $table->string('corriente_termica', 100)->nullable();
        $table->string('corriente_dinamica', 100)->nullable();
        $table->string('corriente_nominal_cierre', 100)->nullable();
        $table->string('medio_extincion', 100)->nullable();
        $table->string('año_fabricacion', 100)->nullable();
        $table->string('forma_cierre_desconexion', 100)->nullable();
        $table->string('factor_primer_polo', 100)->nullable();
        $table->string('secuencia_nominal_maniobra', 100)->nullable();
        $table->string('presion', 100)->nullable();
        $table->string('acondicionamiento', 100)->nullable();
        $table->string('acondicionamiento_fabricante', 100)->nullable();
        $table->string('acondicionamiento_serie', 100)->nullable();
        $table->string('peso_cantidad_carga', 100)->nullable();
        $table->string('c_auxiliares_mando', 100)->nullable();
        $table->string('c_auxiliares_acondicionamiento', 100)->nullable();
        $table->string('c_auxiliares_calefaccion', 100)->nullable();
        $table->string('altura_instalacion', 100)->nullable();
        $table->string('clase_temperatura', 100)->nullable();
        $table->string('normas_fabricacion', 100)->nullable();
        $table->string('nro_ref_catalogo', 100)->nullable();
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
        Schema::dropIfExists('create_equipo_dis_interruptor');
    }
};
