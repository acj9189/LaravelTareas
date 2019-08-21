<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('iva');
            $table->integer('cantidad_disponible');
            $table->integer('cantidad_minima');
            $table->integer('cantidad_maxima');
            $table->biginteger('id_presentacion_producto')->unsigned();
            $table->foreign('id_presentacion_producto')->references('id')->on('presentacion_productos')->onDelete('cascade');

            $table->biginteger('id_categoria_producto')->unsigned();
            $table->foreign('id_categoria_producto')->references('id')->on('categoria_productos')->onDelete('cascade');
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
        //
    }
}
