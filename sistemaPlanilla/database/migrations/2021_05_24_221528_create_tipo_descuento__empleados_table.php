<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDescuentoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipodescuento_empleados', function (Blueprint $table) {
            $table->id('idTipoDescuentoEmpleado');
            $table->double('valorTipoDescuentoEmpleado', 8, 2);
            $table->integer('contadorTipoDescuentoEmpleado');
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->integer('idTipoDescuento')->unsigned();
            $table->foreign('idTipoDescuento')->references('idTipoDescuento')->on('tipo_descuentos');
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
        Schema::dropIfExists('tipodescuento_empleados');
    }
}
