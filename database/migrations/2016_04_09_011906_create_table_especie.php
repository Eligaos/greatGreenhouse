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
            $table->string('especie')->nullable();
            $table->string('cultivar')->nullable();
            $table->string('tipo_fisionomico')->nullable();
            $table->string('habitat')->nullable();
            $table->string('epoca_floracao')->nullable();
            $table->string('coleccao_termica')->nullable();
            $table->string('ph_solo_ideal')->nullable();
            $table->string('ph_agua_ideal')->nullable();
            $table->string('temperatura_atmosferica_ideal')->nullable();
            $table->string('temperatura_solo_ideal')->nullable();
            $table->string('condutividade_electrica_solo_ideal')->nullable();
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
        Schema::drop('especies');
       // Schema::drop('especies_culturas');
    }
}
