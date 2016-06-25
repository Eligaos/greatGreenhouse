<?php

use Illuminate\Database\Seeder;
use \App\Models\Sensor as Sensor;
use \App\Models\Associacoes as Associacoes;

class SensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           	Sensor::insert(array(
    		'nome' => "Humidade",
    		'modelo' => "Criada por Seed",
    		'area_alcance' => "5",
    		'estado' => "1",
    		'tipo_id' => "1",
    		'exploracao_id' => '1',
    		));
    		 Sensor::insert(array(
    		'nome' => "Temperatura Atmosférica",
    		'modelo' => "Criada por Seed",
    		'area_alcance' => "5",
    		'estado' => "1",
    		'tipo_id' => "2",
    		'exploracao_id' => '1',
    		));
    		 Sensor::insert(array(
    		'nome' => "Radiação Solar",
    		'modelo' => "Criada por Seed",
    		'area_alcance' => "5",
    		'estado' => "1",
    		'tipo_id' => "3",
    		'exploracao_id' => '1',
    		));
    		 Sensor::insert(array(
    		'nome' => "Pressão Atmosférica",
    		'modelo' => "Criada por Seed",
    		'area_alcance' => "5",
    		'estado' => "1",
    		'tipo_id' => "4",
    		'exploracao_id' => '1',
    		));


	    		for ($i=1; $i <=4 ; $i++) { 
	    		 	  Associacoes::insert(array(
	    		'sensor_id' => $i,
	    		'setor_id' => "1",

	    		));

    		 }
    	

    		 

    }
}
