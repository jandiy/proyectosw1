<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOferta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio');
            $table->integer('cantidad');
            $table->string('estado');
            $table->string('imagen');
            $table->integer('categoria_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->integer('medida_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marca')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('categoria_id')->references('id')->on('categoria')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medida_id')->references('id')->on('medida')
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
       Schema::dropIfExists('producto');
    }
}
