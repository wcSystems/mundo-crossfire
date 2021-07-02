<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarForeignIdKits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suscripciones', function (Blueprint $table) {
            $table->dropForeign('suscripciones_kit_id_foreign');
            $table->dropColumn("kit_id");
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
