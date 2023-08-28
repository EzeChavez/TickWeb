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
        Schema::create('estados_reservas_aparts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Columna para el nombre del estado
            $table->string('detalle'); // Columna para el nombre del estado
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
        Schema::dropIfExists('estados_reservas_aparts');
    }
};
