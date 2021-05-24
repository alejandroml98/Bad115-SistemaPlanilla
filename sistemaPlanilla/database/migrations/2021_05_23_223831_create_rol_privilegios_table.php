<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_privilegios', function (Blueprint $table) {
            $table->id('idRolPrivilegio');
            $table->integer('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('Rols');
            $table->integer('idPrivilegio')->unsigned();
            $table->foreign('idPrivilegio')->references('idPrivilegio')->on('Privilegios');
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
        Schema::dropIfExists('rol_privilegios');
    }
}
