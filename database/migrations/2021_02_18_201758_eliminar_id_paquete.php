<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarIdPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kits', function (Blueprint $table) {
            $table->dropForeign('kits_paquete_id_foreign');
            $table->dropColumn("paquete_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kits', function (Blueprint $table) {
            //
        });
    }
}
