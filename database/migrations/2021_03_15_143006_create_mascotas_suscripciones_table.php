<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasSuscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas_suscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('cantidad');
            $table->string('tipo')->nullable();
            $table->unsignedBigInteger('suscripcion_id');
            $table->foreign('suscripcion_id')->references('id')->on('suscripciones')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mascotas_suscripciones');
    }
}
