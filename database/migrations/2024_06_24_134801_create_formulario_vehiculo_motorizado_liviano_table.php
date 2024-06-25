<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioVehiculoMotorizadoLivianoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('agnio');
            $table->string('patente');
            $table->string('n_chasis');
            $table->string('n_motor');
            $table->string('color');
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
        Schema::create('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('agnio');
            $table->string('patente');
            $table->string('n_chasis');
            $table->string('n_motor');
            $table->string('color');
            $table->timestamps();
        });
    }
}
