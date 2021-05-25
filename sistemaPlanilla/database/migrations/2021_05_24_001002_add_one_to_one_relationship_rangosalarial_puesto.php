<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOneToOneRelationshipRangosalarialPuesto extends Migration
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
        Schema::table('rango_salarials', function (Blueprint $table) {
            $table->string('codigoPuesto')->unsigned();
            $table->foreign('codigoPuesto')->references('codigoPuesto')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->dropColumn('idRangoSalarial');
        });
        Schema::table('rango_salarials', function (Blueprint $table) {
            $table->dropColumn('codigoPuesto');
        });
    }
}
