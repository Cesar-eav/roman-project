<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_externos', function (Blueprint $table) {
            $table->id();            
            $table->string('nivel_ejecutivo')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('rut')->unique()->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('fono')->nullable();
            $table->string('mail')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            $table->string('isapre')->nullable();
            $table->string('afp')->nullable();
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
        Schema::dropIfExists('usuarios_externos');
    }
}
