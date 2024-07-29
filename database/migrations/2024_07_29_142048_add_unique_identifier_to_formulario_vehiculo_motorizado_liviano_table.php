<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueIdentifierToFormularioVehiculoMotorizadoLivianoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->string('unique_identifier')->unique()->after('created_at')->nullable();
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
            $table->dropColumn('unique_identifier');
        });
    }
}
