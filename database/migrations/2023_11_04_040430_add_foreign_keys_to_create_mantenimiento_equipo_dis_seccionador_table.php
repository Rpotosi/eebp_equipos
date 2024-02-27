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
        Schema::table('create_mantenimiento_equipo_dis_seccionador', function (Blueprint $table) {
            $table->foreign(['id_equipo_sec_fk'], 'create_mantenimiento_equipo_dis_seccionador_ibfk_1')->references(['id_equipo_sec'])->on('create_equipo_dis_seccionador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_mantenimiento_equipo_dis_seccionador', function (Blueprint $table) {
            $table->dropForeign('create_mantenimiento_equipo_dis_seccionador_ibfk_1');
        });
    }
};
