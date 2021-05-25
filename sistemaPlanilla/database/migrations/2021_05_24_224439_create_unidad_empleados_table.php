<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_empleados', function (Blueprint $table) {
            $table->id('idUnidadEmpleado');
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->string('codigoUnidad')->unsigned();
            $table->foreign('codigoUnidad')->references('codigoUnidad')->on('unidads');
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
        Schema::dropIfExists('unidad_empleados');
    }
}
