<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApellidosToCiaSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cia_seguros', function (Blueprint $table) {
            $table->string('apellidos_representante_legal')->after('representante_legal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cia_seguros', function (Blueprint $table) {
            $table->string('apellidos_representante_legal')->after('representante_legal');

        });
    }
}
