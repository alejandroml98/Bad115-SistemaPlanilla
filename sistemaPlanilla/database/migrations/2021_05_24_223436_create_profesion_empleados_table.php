<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesion_empleados', function (Blueprint $table) {
            $table->id('idProfesionEmpleado');
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->integer('idProfesion')->unsigned();
            $table->foreign('idProfesion')->references('idProfesion')->on('profesions');
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
        Schema::dropIfExists('profesion_empleados');
    }
}
