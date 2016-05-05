<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetorTiposLeiturasAssociadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('setor_tipos_leituras_associadas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('tipo_id')->unsigned();
        $table->integer('leitura_id')->unsigned()->nullable();
        $table->integer('setor_id')->unsigned()->nullable();
        $table->foreign('leitura_id')->references('id')->on('leituras');
        $table->foreign('setor_id')->references('id')->on('setores');
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
       Schema::table('setor_tipos_leituras_associadas', function(Blueprint $table) {
        $table->dropForeign(['leitura_id']);        
        $table->dropForeign(['setor_id']);
    });

       Schema::drop('setor_tipos_leituras_associadas');
   }
}

