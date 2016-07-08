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
      Schema::create('alarmes', function (Blueprint $table) {
       $table->increments('id');
       $table->integer('associacoes_id')->unsigned();
       $table->foreign('associacoes_id')->references('id')->on('associacoes')->onDelete('cascade');
       $table->string('regra');
       $table->float('valor');            
       $table->string('descricao');
       $table->softDeletes();
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
     Schema::table('alarmes', function(Blueprint $table) {
      $table->dropForeign(['associacoes_id']);
    });
     Schema::drop('alarmes');
   }
 }
