<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setor_id');       
            $table->integer('estufa_id')->unsigned();
            $table->foreign('estufa_id')->references('id')->on('estufas');
            $table->string('nome');
            $table->string('descricao');
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
        Schema::table('setores', function(Blueprint $table) {
            $table->dropForeign('estufa_id');
        });

        Schema::drop('setores');
    }
    
}

