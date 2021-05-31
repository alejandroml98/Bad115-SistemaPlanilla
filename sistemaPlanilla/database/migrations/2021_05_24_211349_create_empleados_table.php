<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->string('codigoEmpleado', 7)->primary();
            $table->string('primerNombre');
            $table->string('segundoNombre')->nullable();
            $table->string('apellidoPaterno')->nullable();
            $table->string('apellidoMaterno')->nullable();
            $table->string('apellidoCasado')->nullable();
            $table->date('fechaNacimiento');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idGenero')->unsigned();
            $table->foreign('idGenero')->references('idGenero')->on('generos');
            $table->integer('idDireccion')->unsigned();
            $table->foreign('idDireccion')->references('idDireccion')->on('direccions');
            $table->integer('idEstadoCivil')->unsigned();
            $table->foreign('idEstadoCivil')->references('idEstadoCivil')->on('estado_civils');
            $table->string('codigoEmpresa')->unsigned();
            $table->foreign('codigoEmpresa')->references('codigoEmpresa')->on('empresas');
            $table->string('codigoPuesto')->unsigned();
            $table->foreign('codigoPuesto')->references('codigoPuesto')->on('puestos');
            $table->double('salario', 8, 2);
            $table->string('correoElectronico');
            $table->string('correoEmpresarial')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
