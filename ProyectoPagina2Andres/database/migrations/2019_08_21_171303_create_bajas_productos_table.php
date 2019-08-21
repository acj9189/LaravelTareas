<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('bajas_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_baja');
            $table->integer('cantidad');
            $table->integer('precio_producto');
            $table->biginteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('bajas_productos');
    }
}
