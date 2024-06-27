<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignOnFormularioVehiculoMotorizadoLivianos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->unsignedBigInteger('ejecutivo_id')->nullable();
            $table->foreign('ejecutivo_id')->references('id')->on('ejecutivas');
    
            $table->unsignedBigInteger('compania_id')->nullable();
            $table->foreign('compania_id')->references('id')->on('cia_seguros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formulario_vehiculo_motorizado_livianos', function (Blueprint $table) {
            $table->unsignedBigInteger('ejecutivo_id');
            $table->foreign('ejecutivo_id')->references('id')->on('ejecutivas');
    
            $table->unsignedBigInteger('compania_id');
            $table->foreign('compania_id')->references('id')->on('cia_aseguradoras');
        });
    }
}
