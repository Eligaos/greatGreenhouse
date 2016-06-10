<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estufa_id')->unsigned();      
            $table->foreign('estufa_id')->references('id')->on('estufas')->onDelete('cascade');      
            $table->string('nome');
            $table->string('descricao');
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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('setores');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        /*Schema::table('setores', function(Blueprint $table) {
            $table->dropForeign('setores_estufa_id_foreign');
        });

        Schema::drop('setores');*/
    }
    
}

