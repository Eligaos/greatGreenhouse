<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoLeitura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('tipos_leituras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sensor_id')->unsigned();
            $table->foreign('sensor_id')->references('id')->on('sensores');
            $table->string('parametro');
            $table->string('unidade');
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
        Schema::drop('tipos_leituras');
    }
}
