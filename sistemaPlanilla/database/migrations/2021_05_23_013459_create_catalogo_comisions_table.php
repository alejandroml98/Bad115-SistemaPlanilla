<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoComisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_comisions', function (Blueprint $table) {
            $table->id('idCatalogoComision');
            $table->string('nombreComision');
            $table->float('porcentaje');
            $table->double('valMinComision', 8, 2);
            $table->double('valMaxComision', 8, 2);
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
        Schema::dropIfExists('catalogo_comisions');
    }
}
