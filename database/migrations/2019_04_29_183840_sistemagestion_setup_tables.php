<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SistemagestionSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('idempleado');            
            $table->string('nombre')->nullable();    
            $table->string('departamento')->nullable();  
            $table->float('sueldo')->nullable();  
            $table->string('sexo')->nullable();                        
            $table->timestamps();
        });

        Schema::create('paises', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre')->nullable();                
            $table->timestamps();
        });

        
        Schema::create('accionesterapeuticas', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre')->nullable();                
            $table->timestamps();
        });

        Schema::create('posiciones', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('nroestante')->nullable();                
            $table->integer('nrofila')->nullable();                            
            $table->timestamps();
        });

        Schema::create('lotes', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('codigo')->nullable();                
            $table->date('fechaproduccion')->nullable();                            
            $table->date('fechavencimiento')->nullable();                            
            $table->timestamps();
        });

        Schema::create('provedores', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre')->nullable();                
            $table->string('telefono')->nullable();                            
            $table->string('email')->nullable();                            
            $table->string('compania')->nullable();                            
            $table->timestamps();
        });
        
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre')->nullable();                
            $table->string('descripcion')->nullable();                                                    
            $table->integer('pais_id')->unsigned();
            $table->timestamps();

            $table->foreign('pais_id')->references('id')->on('paises')
                ->onUpdate('cascade')->onDelete('cascade');            
        });
        
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');            
            $table->date('fecha')->nullable();                
            $table->integer('monto')->nullable();                            
            $table->integer('provedor_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('provedor_id')->references('id')->on('provedores')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            
        });

        Schema::create('medicamentos', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre')->nullable();                
            $table->string('descripcion')->nullable();                
            $table->integer('pventa')->nullable();                            
            $table->integer('stock')->nullable();
            
            $table->integer('laboratorio_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('accionesterapeuticas_id')->unsigned();
            $table->integer('lote_id')->unsigned();
            $table->integer('posicion_id')->unsigned();
            

            $table->timestamps();

            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('categoria_id')->references('id')->on('categorias')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('accionesterapeuticas_id')->references('id')->on('accionesterapeuticas')
            ->onUpdate('cascade')->onDelete('cascade'); 
            
            $table->foreign('lote_id')->references('id')->on('lotes')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('posicion_id')->references('id')->on('posiciones')
            ->onUpdate('cascade')->onDelete('cascade');


            
        });

        Schema::create('compra_medica', function (Blueprint $table) {
            $table->increments('id');                                    
            $table->integer('compra_id')->unsigned();
            $table->integer('medica_id')->unsigned();
            $table->integer('cantidad')->nullable();
            $table->integer('pcompra')->nullable();

            $table->foreign('compra_id')->references('id')->on('compras')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medica_id')->references('id')->on('medicamentos')
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
        Schema::drop('categorias');
        Schema::drop('paises');
        Schema::drop('accionesterapeuticas');
        Schema::drop('posiciones');
        Schema::drop('lotes');
        Schema::drop('provedores');
        Schema::drop('laboratorios');
        Schema::drop('compras');
        Schema::drop('medicamentos');
        Schema::drop('compra_medica');
        
    }
}
