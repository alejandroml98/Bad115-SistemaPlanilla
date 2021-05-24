<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadCentroCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_centrocostos', function (Blueprint $table) {
            $table->id('idUnidadCentroCostos');
            $table->double('presupuestoFinal', 8, 2);
            $table->double('gastoTotal', 8, 2)->nullable();
            $table->date('anio');
            $table->string('codigoUnidad')->unsigned();
            $table->foreign('codigoUnidad')->references('codigoUnidad')->on('unidads');
            $table->integer('idCentroCostos')->unsigned();
            $table->foreign('idCentroCostos')->references('idCentroCostos')->on('centro_costos');
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
        Schema::dropIfExists('unidad_centrocostos');
    }
}
