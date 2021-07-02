<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrecioEnvioToClientesNoRegistrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes_no_registrados', function (Blueprint $table) {
            $table->string('nrocasa')->nullable();
            $table->text('referencia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes_no_registrados', function (Blueprint $table) {
            //
        });
    }
}
