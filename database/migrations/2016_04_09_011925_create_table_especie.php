<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEspecie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_comum');
            $table->string('especie');
            $table->string('cultivar');
            $table->string('tipo_fisionomico');
            $table->string('habitat');
            $table->string('epoca_floracao');
            $table->string('coleccao_termica');
            $table->float('ph_solo_ideal');
            $table->float('ph_agua_ideal');
            $table->float('temperatura_atmosferica_min');
            $table->float('temperatura_atmosferica_max');
            $table->float('temperatura_solo_min');
            $table->float('temperatura_solo_max');
            $table->float('condutividade_electrica_solo_ideal');
            $table->timestamps();  
        });

        Schema::create('especies', function (Blueprint $table) { 
           $table->integer('especie_id');
           $table->integer('cultura_id');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('especies');
    }
}
