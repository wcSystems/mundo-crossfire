<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitsSuscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kits_suscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kits_suscripciones');
    }
}
