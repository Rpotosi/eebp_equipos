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
        Schema::create('create_mantenimiento_vehiculo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('id_vehiculo_fk')->nullable()->index('id_vehiculo_fk');
            $table->date('fecha')->nullable();
            $table->text('descripción')->nullable();
            $table->string('tipo_procedimiento', 100)->nullable();
            $table->string('responsable', 100)->nullable();
            $table->string('laboratorio_empresa', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->string('archivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_mantenimiento_vehiculo');
    }
};
