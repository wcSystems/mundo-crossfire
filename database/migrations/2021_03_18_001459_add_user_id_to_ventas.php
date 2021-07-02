<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->after('producto_id');
            $table->unsignedBigInteger('user_not_register_id')->nullable();
            $table->foreign('user_not_register_id')->references('id')->on('clientes_no_registrados')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
}
