<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('detalle_carrito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('producto_id')->unsigned();
            $table->integer('carrito_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('codigo')->on('producto')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('carrito_id')->references('id')->on('carrito')
                ->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_carrito');
    }
}
