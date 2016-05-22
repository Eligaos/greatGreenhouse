<?php

use Illuminate\Database\Seeder;
use \App\Models\Estufa as Estufa;
use \App\Models\Setor as Setor;

class EstufaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	Estufa::insert(array(
    		'exploracoes_id' => "1",
    		'nome' => "Estufa 1",
    		'descricao' => 'Criada por Seed',
    		));
        	Setor::insert(array(
    		'estufa_id' => "1",
    		'nome' => "Nenhum",
    		'descricao' => 'Setor Geral',
    		));


    }
}
