<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutoincrementalFieldToFormularioVehiculoMotorizadoLivianoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->unsignedBigInteger('n_cotizacion')->nullable()->after('unique_identifier');
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
