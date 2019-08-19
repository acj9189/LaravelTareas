<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valor_pago');
            $table->date('fecha_pago');
            $table->integer('clientesid')->unsigned();
            $table->foreign('clientesid')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('pagos_clientes');
    }
}
