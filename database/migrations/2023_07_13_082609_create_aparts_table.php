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
        
        Schema::create('aparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->string('nombre');
            $table->integer('capacidad');
            $table->string('estado_apart');
            $table->timestamps();/* funcion que crea los campos created_at, updateda_at */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aparts');
    }
};
