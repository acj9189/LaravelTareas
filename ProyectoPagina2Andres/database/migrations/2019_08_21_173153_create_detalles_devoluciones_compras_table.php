<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesDevolucionesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_devoluciones_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->biginteger('id_devoluciones_compras')->unsigned();
            $table->foreign('id_devoluciones_compras')->references('id')->on('devoluciones_compras')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_devoluciones_compras');
    }
}
