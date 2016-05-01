<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sensores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('modelo');
            $table->float('area_alcance');
            $table->boolean('estado');
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
            Schema::drop('sensores');
    }
}
