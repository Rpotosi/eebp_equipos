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
        Schema::table('create_mantenimiento_vehiculo', function (Blueprint $table) {
            $table->foreign(['id_vehiculo_fk'], 'create_mantenimiento_vehiculo_ibfk_1')->references(['id_vehiculo'])->on('create_vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_mantenimiento_vehiculo', function (Blueprint $table) {
            $table->dropForeign('create_mantenimiento_vehiculo_ibfk_1');
        });
    }
};
