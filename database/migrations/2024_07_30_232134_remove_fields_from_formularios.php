<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsFromFormularios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->dropColumn(['marca', 'modelo', 'patente', 'agnio', 'n_chasis', 'n_motor', 'color']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->string('marca');
            $table->string('modelo');
            $table->string('patente');
            $table->string('agnio');
            $table->string('n_chasis');
            $table->string('n_motor');
            $table->string('color');
        });
    }
}
