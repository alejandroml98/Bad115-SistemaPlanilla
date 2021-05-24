<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToTipoUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipo_unidads', function (Blueprint $table) {
            $table->integer('idTipoUnidadPadre')->nullable();
            $table->foreign('idTipoUnidadPadre')->references('idTipoUnidad')->on('tipo_unidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_unidads', function (Blueprint $table) {
            $table->dropColumn('idTipoUnidadPadre');
        });
    }
}
