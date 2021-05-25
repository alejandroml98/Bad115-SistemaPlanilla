<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidads', function (Blueprint $table) {
            $table->string('codigoUnidadAntecesora')->nullable();
            $table->foreign('codigoUnidadAntecesora')->references('codigoUnidad')->on('unidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidads', function (Blueprint $table) {
            $table->dropColumn('codigoUnidadAntecesora');
        });
    }
}
