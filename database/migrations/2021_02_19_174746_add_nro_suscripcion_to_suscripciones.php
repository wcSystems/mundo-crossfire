<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNroSuscripcionToSuscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suscripciones', function (Blueprint $table) {
            $table->string('nro_suscripcion');
            $table->string('region');
            $table->string('comuna');
            $table->string('calle_avenida');
            $table->string('numero');
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
