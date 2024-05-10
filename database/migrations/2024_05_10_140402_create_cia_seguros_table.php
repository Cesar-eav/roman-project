<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiaSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cia_seguros', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social')->nullable();
            $table->string('nombre_fantasia')->nullable();
            $table->string('rut_empresa')->nullable();
            $table->string('direccion')->nullable();
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            $table->string('fono')->nullable();
            $table->string('mail')->nullable();
            $table->string('nombre_banco')->nullable();
            $table->string('num_cuenta')->nullable();
            $table->string('representante_legal')->nullable();
            $table->string('rut_representante')->nullable();
            $table->string('mail_representante')->nullable();
            $table->string('fono_representante')->nullable();
            $table->string('nombre_gerente')->nullable();
            $table->string('direccion_gerente')->nullable();
            $table->string('comuna_gerente')->nullable();
            $table->string('region_gerente')->nullable();
            $table->string('fono_gerente')->nullable();
            $table->string('mail_gerente')->nullable();
            $table->date('fecha_nacimiento_gerente')->nullable();
            $table->string('ejecutiva_1')->nullable();
            $table->string('fono_ejecutiva_1')->nullable();
            $table->string('mail_ejecutiva_1')->nullable();
            $table->date('fecha_nacimiento_ejecutiva_1')->nullable();
            $table->string('ejecutiva_2')->nullable();
            $table->string('fono_ejecutiva_2')->nullable();
            $table->string('mail_ejecutiva_2')->nullable();
            $table->date('fecha_nacimiento_ejecutiva_2')->nullable();
            $table->string('ejecutiva_3')->nullable();
            $table->string('fono_ejecutiva_3')->nullable();
            $table->string('mail_ejecutiva_3')->nullable();
            $table->date('fecha_nacimiento_ejecutiva_3')->nullable();
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
        Schema::dropIfExists('cia_seguros');
    }
}
