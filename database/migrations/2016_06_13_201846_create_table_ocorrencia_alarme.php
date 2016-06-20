<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOcorrenciaAlarme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_alarme', function (Blueprint $table) {
         $table->primary(['alarme_id','leitura_id']);
         $table->integer('alarme_id')->unsigned();
         $table->foreign('alarme_id')->references('id')->on('alarmes');
         $table->integer('leitura_id')->unsigned();
         $table->foreign('leitura_id')->references('id')->on('leituras');
         $table->boolean('checked');
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
        Schema::table('ocorrencia_alarme', function(Blueprint $table) {
            $table->dropForeign(['alarme_id']);
            $table->dropForeign(['leitura_id']);
        });
        Schema::drop('ocorrencia_alarme');
    }
}
