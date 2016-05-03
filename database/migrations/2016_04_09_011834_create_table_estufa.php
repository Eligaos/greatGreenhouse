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
            $table->integer('exploracoes_id')->unsigned();
            
            $table->string('nome')->unique();
            $table->string('descricao');            
            $table->timestamps();          
        });

        Schema::table('estufas', function($table){
         $table->foreign('exploracoes_id')->references('id')->on('exploracoes')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('estufas', function(Blueprint $table) {
        $table->dropForeign('estufas_exploracoes_id_foreign');
    });

     Schema::drop('estufas');
 }
}
