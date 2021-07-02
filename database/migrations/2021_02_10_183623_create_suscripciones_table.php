<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dia_visita');
            $table->string('semana_visita');
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
        Schema::dropIfExists('suscripciones');
    }
}
