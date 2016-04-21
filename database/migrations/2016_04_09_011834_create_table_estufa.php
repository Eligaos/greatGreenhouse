<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstufa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estufas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('descricao');            
            $table->integer('exploracoes_id');
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
        Schema::drop('estufas');
    }
}
