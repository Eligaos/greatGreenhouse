<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLeitura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leituras', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor'); 
            $table->integer('associacao_id')->unsigned();
            $table->foreign('associacao_id')->references('id')->on('associacoes');
            $table->boolean('manual'); //0 - nao 1 -sim
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
       Schema::table('leituras', function(Blueprint $table) {
        $table->dropForeign('leituras_associacao_id_foreign');
    });

       Schema::drop('leituras');
   }

}

