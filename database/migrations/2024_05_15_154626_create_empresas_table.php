<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social')->nullable();
            $table->string('nombre_fantasia')->nullable();
            $table->string('nombres_persona_natural')->nullable();
            $table->string('apellido_paterno_persona_natural')->nullable();
            $table->string('apellido_materno_persona_natural')->nullable();
            $table->string('rut_empresa_persona')->nullable();
            $table->string('direccion')->nullable();
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            $table->string('fono')->nullable();
            $table->string('mail')->nullable();
            $table->string('nombre_banco')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->string('representante_legal')->nullable();
            $table->string('rut_representante_legal')->nullable();
            $table->string('mail_representante_legal')->nullable();
            $table->string('fono_representante_legal')->nullable();
            $table->date('fecha_nacimiento')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
