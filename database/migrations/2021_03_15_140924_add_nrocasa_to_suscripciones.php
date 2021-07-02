<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNrocasaToSuscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suscripciones', function (Blueprint $table) {
            $table->string('nrocasa')->nullable();
            $table->text('referencia')->nullable();
            $table->string('mascotas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscripciones', function (Blueprint $table) {
            //
        });
    }
}
