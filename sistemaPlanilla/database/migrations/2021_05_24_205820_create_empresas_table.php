<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->string('codigoEmpresa', 7)->primary();
            $table->integer('idDireccion')->unsigned();
            $table->foreign('idDireccion')->references('idDireccion')->on('direccions');
            $table->string('nombreEmpresa');
            $table->string('nit');
            $table->string('nic');
            $table->string('telefonoEmpresa');
            $table->string('paginaWeb')->nullable();
            $table->boolean('periodoPago');
            $table->string('correoElectronicoEmpresa');
            $table->double('salarioMinimo', 5, 2);
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
        Schema::dropIfExists('empresas');
    }
}
