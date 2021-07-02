<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechasSuscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas_suscripciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_1')->nullable();
            $table->date('fecha_2')->nullable();
            $table->date('fecha_3')->nullable();
            $table->date('fecha_4')->nullable();
            $table->date('fecha_5')->nullable();
            $table->date('fecha_6')->nullable();
            $table->date('fecha_7')->nullable();
            $table->date('fecha_8')->nullable();
            $table->date('fecha_9')->nullable();
            $table->date('fecha_10')->nullable();
            $table->date('fecha_11')->nullable();
            $table->date('fecha_12')->nullable();
            $table->date('fecha_13')->nullable();
            $table->date('fecha_14')->nullable();
            $table->date('fecha_15')->nullable();
            $table->date('fecha_16')->nullable();
            $table->date('fecha_17')->nullable();
            $table->date('fecha_18')->nullable();
            $table->date('fecha_19')->nullable();
            $table->date('fecha_20')->nullable();
            $table->date('fecha_21')->nullable();
            $table->date('fecha_22')->nullable();
            $table->date('fecha_23')->nullable();
            $table->date('fecha_24')->nullable();
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
        Schema::dropIfExists('fechas_suscripciones');
    }
}
