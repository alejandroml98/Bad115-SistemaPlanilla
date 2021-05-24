<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ingresos', function (Blueprint $table) {
            $table->id('a');
            $table->integer('idTipoIngresoEmpleado')->unsigned();
            $table->foreign('idTipoIngresoEmpleado')->references('idTipoIngresoEmpleado')->on('tipo_ingresos__empleados');
            $table->string('nombreTipoIngresos');
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
        Schema::dropIfExists('tipo_ingresos');
    }
}
