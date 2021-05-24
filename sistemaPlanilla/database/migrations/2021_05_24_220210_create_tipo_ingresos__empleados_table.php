<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoIngresosEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoingresos_empleados', function (Blueprint $table) {
            $table->id('idTipoIngresoEmpleado');
            $table->double('valoTipoIngresoEmpleado', 8, 2);
            $table->integer('contadorTipoIngresoEmpleado');
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->integer('idTipoIngresos')->unsigned();
            $table->foreign('idTipoIngresos')->references('idTipoIngresos')->on('tipo_ingresos');
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
        Schema::dropIfExists('tipoingresos_empleados');
    }
}
