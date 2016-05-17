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
        $table->integer('sensor_id')->unsigned();
        $table->integer('setor_id')->unsigned();
            $table->boolean('manual'); //0 - nao 1 -sim
            $table->foreign('setor_id')->references('id')->on('setores');
            $table->foreign('sensor_id')->references('id')->on('sensores');
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
        $table->dropForeign('associacoes_sensor_id_foreign');
    });

     Schema::drop('associacoes');
 }
}

