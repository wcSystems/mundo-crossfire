<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesNoRegistradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_no_registrados', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('email');
            $table->string('phone');
            $table->string('region');
            $table->string('comuna');
            $table->string('calle');
            $table->string('nrocalle');
            $table->string('nrocasa');
            $table->string('referencia');
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
        //Schema::dropIfExists('clientes_no_registrados');
    }
}
