<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres_camping', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_alquiler_camping');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_parcela');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->decimal('costo_total');
            $table->decimal('pago');
            $table->decimal('debe');
            $table->unsignedBigInteger('id_estado_alquiler_camping'); 
            $table->timestamps();/* funcion que crea los campos created_at, updateda_at */
            $table->foreign('id_estado_alquiler_camping')->references('id')->on('estados_alquiler_camping');
            $table->foreign("id_parcela")->references("id")->on("parcelas_camping");
            $table->foreign("id_cliente")->references("id")->on("clientes");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquileres_camping');
    }
};
