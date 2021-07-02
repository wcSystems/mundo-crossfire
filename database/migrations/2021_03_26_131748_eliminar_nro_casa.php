<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarNroCasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes_no_registrados', function (Blueprint $table) {
            $table->dropColumn('nrocasa');
            $table->dropColumn('referencia');
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
