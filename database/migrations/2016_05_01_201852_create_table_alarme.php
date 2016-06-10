<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlarme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     $table->increments('id');
     $table->integer('setor_id')->unsigned();
     $table->foreign('setor_id')->references('id')->on('setores')->onDelete('cascade');
     $table->string('descricao');
     $table->timestamps();
 }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('alarme');
   }
}
