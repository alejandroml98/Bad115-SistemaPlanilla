<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_bancarias', function (Blueprint $table) {
            $table->id('idCuentaBancaria');
            $table->string('cuentaBancaria');
            $table->double('saldoCuentaBancaria', 8, 2);
            $table->string('codigoEmpleado')->unsigned();
            $table->foreign('codigoEmpleado')->references('codigoEmpleado')->on('empleados');
            $table->integer('idBanco')->unsigned();
            $table->foreign('idBanco')->references('idBanco')->on('bancos');
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
        Schema::dropIfExists('cuenta_bancarias');
    }
}
