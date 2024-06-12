<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCiaSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cia_seguros', function (Blueprint $table) {
            if (!Schema::hasColumn('cia_seguros', 'banco_id')) {
                $table->unsignedBigInteger('banco_id')->nullable();
            }
            $table->foreign('banco_id',  'fk_cia_seguros_banco_id')->references('id')->on('bancos')->onDelete('set null');
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
            //
        });
    }
}
