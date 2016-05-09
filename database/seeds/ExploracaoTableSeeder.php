<?php

use Illuminate\Database\Seeder;
use \App\Models\Exploracao as Exploracao;

class ExploracaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Exploracao::insert(array(
    		'nome' => "Exploracao A",
    		'numero' => "123456789",
    		'distrito' => 'Leiria',
    		'concelho' => 'Leiria',
    		'freguesia' => 'Leiria',
    		));
    }
}
