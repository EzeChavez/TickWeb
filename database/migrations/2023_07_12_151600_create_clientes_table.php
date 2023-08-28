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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('usuario_id')->nullable()->constrained('users');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->biginteger('telefono');
            $table->string('domicilio');
            $table->string('patente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * PK
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
