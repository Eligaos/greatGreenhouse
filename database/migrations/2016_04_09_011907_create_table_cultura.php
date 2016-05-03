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
            $table->date('data_inicio_ciclo')->nullable();
            $table->date('data_prevista_fim_ciclo')->nullable();
            $table->string('tipo_cultivo');
            $table->string('tipo_cultura');
            $table->integer('setor_id')->unsigned();
            $table->integer('especie_id')->unsigned()->nullable();
            $table->timestamps();      
        });

        Schema::table('culturas', function($table)
        {
            $table->foreign('setor_id')->references('id')->on('setores')->onDelete('cascade');
            $table->foreign('especie_id')->references('id')->on('especies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('culturas', function(Blueprint $table) {
            $table->dropForeign(['setor_id']);
            $table->dropForeign(['especie_id']);
        });
        Schema::drop('culturas');
    }
}
