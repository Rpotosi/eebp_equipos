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
        Schema::create('create_mantenimiento_equipo_dis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('id_equipo_fk')->nullable()->index('id_equipo_fk');
            $table->date('fecha_mantenimiento')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('averia_dano', 100)->nullable();
            $table->string('referencia_repuesto', 100)->nullable();
            $table->string('responsable', 100)->nullable();
            $table->string('precio', 100)->nullable();
            $table->string('anexos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_mantenimiento_equipo_dis');
    }
};
