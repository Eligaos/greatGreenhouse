<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssociacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('associacoes', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('tipo_id')->unsigned();
        $table->integer('setor_id')->unsigned()->nullable();
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
       Schema::table('associacoes', function(Blueprint $table) {
        $table->dropForeign('associacoes_setor_id_foreign');
    });

       Schema::drop('associacoes');
   }
}

