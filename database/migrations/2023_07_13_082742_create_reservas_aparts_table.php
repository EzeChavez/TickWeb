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
        Schema::create('reservas_aparts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_apart');
            $table->unsignedBigInteger('id_cliente');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->decimal('costo_total');
            $table->decimal('pago');
            $table->decimal('debe');
            $table->string('comentario');
            $table->unsignedBigInteger('id_estado_apart');
            $table->unsignedBigInteger('id_estado_reserva_apart');              
            $table->date('expires_at')->nullable();
            $table->timestamps(); /* Función que crea los campos created_at , updated_at */
            
            $table->foreign('id_estado_apart')->references('id')->on('estados_aparts');
            $table->foreign('id_estado_reserva_apart')->references('id')->on('estados_reservas_aparts');
            $table->foreign('id_apart')->references('id')->on('aparts');
            $table->foreign('id_cliente')->references('id')->on('clientes');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas_aparts');
    }
};
