<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Polizas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_poliza')->nullable();
            $table->string('numero_poliza')->nullable();
            $table->decimal('monto_asegurado', 10, 2)->nullable();
            $table->decimal('prima', 10, 2)->nullable();
            $table->decimal('valor_neto', 10, 2)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->decimal('deducible', 10, 2)->nullable();
            $table->integer('cantidad_cuotas')->nullable();
            $table->string('dia_pago')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('aseguradora')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('archivos_seleccionados')->nullable(); // Para almacenar los nombres de los archivos seleccionados
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
        Schema::dropIfExists('polizas');

    }
}
