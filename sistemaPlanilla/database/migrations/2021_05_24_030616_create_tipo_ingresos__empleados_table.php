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
        Schema::create('tipo_ingresos__empleados', function (Blueprint $table) {
            $table->id('idTipoIngresoEmpleado');
            $table->double('valorTipoIngresoEmpleado', 10, 2);
            $table->integer('contadorTipoIngresosEmpleado');
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
        Schema::dropIfExists('tipo_ingresos__empleados');
    }
}
