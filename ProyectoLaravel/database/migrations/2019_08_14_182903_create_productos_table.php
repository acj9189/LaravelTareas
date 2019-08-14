<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('iva');
            $table->integer('cantidad_disponible');
            $table->integer('cantidad_minima');
            $table->integer('cantidad_maxima');
            $table->bigInteger('id_presentacion_producto')->unsigned();
            $table->bigInteger('id_categoria_producto')->unsigned(); 
            $table->timestamps(); 
        });

        Schema::table('productos', function($table){
            $table->foreign('id_presentacion_producto')->references('id')->on('presentacion_productos')->onDelete('cascade');    
            $table->foreign('id_categoria_producto')->references('id')->on('categoria_productos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
