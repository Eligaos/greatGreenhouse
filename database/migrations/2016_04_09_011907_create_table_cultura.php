<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCultura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->bigInteger('duracao_ciclo');
            $table->bigInteger('espaco_entre_linhas');
            $table->bigInteger('espaco_na_linha');
            $table->date('data_inicio_ciclo');
            $table->date('data_prevista_fim_ciclo');
            $table->string('tipo_cultivo');
            $table->string('tipo_cultura');
            $table->integer('setor_id')->unsigned();
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
        Schema::drop('culturas');
    }
}
