<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableFieldsToFormularios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulario_vehiculo_motorizado_liviano', function (Blueprint $table) {
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('patente')->nullable();
            $table->string('agnio')->nullable();
            $table->string('n_chasis')->nullable();
            $table->string('n_motor')->nullable();
            $table->string('color')->nullable();        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn(['marca', 'modelo', 'patente', 'agnio', 'n_chasis', 'n_motor', 'color']);
        });
    }
}
