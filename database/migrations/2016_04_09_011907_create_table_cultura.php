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
            $table->long('duracao_ciclo');
            $table->long('espaco_entre_linhas');
            $table->long('espaco_na_linha');
            $table->date('data_inicio_ciclo');
            $table->date('data_prevista_fim_ciclo');
            $table->string('tipo_cultivo');
            $table->string('tipo_cultura');
            $table->integer('setor_id');
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
