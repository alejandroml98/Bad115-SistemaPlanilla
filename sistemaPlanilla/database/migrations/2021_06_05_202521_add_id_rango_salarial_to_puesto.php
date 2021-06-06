<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdRangoSalarialToPuesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->integer('idRangoSalarial')->unsigned();
            $table->foreign('idRangoSalarial')->references('idRangoSalarial')->on('rango_salarials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puesto', function (Blueprint $table) {
            //
        });
    }
}
