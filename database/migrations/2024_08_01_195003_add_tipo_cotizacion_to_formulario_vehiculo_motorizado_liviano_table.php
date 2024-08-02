<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoCotizacionToFormularioVehiculoMotorizadoLivianoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->string('tipo_cotizacion')->nullable()->after('id');
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
            //
        });
    }
}
