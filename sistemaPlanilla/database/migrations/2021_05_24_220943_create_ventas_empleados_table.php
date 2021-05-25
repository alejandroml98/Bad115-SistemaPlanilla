<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_empleados', function (Blueprint $table) {
            $table->id('idVentasEmpleado');
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->double('valorVenta', 8, 2);
            $table->date('fechaVenta');
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
        Schema::dropIfExists('ventas_empleados');
    }
}
