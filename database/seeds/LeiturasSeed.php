<?php

use Illuminate\Database\Seeder;
use \App\Models\Leitura as Leitura;

class LeiturasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Excel::load('dados.xls', function($reader) {


		    // Getting all results
    		$results = $reader->get();

		    // ->all() is a wrapper for ->get() and will work the same
		  //  $results = $reader->all();
    		foreach ($results as $key => $value) {


    			/*$results[$key]->date;
    			$results[$key]->airtemperature;
    			$results[$key]->relativehumidity;
    			$results[$key]->radiation;
    			$results[$key]->atmosphericpressure;*/

    			Leitura::insert(array(
    				'valor' => $results[$key]->relativehumidity,
    				'associacao_id' => "1",
    				'manual' => "0",
    				'data' => $results[$key]->date,
    				));
    			

    			Leitura::insert(array(
    				'valor' => $results[$key]->airtemperature,
    				'associacao_id' => "2",
    				'manual' => "0",
    				'data' => $results[$key]->date,
    				));
    			
    			Leitura::insert(array(
    				'valor' => $results[$key]->radiation,
    				'associacao_id' => "3",
    				'manual' => "0",
    				'data' => $results[$key]->date,
    				));
    			
    			Leitura::insert(array(
    				'valor' => $results[$key]->atmosphericpressure,
    				'associacao_id' => "4",
    				'manual' => "0",
    				'data' => $results[$key]->date,
    				));
    			


    		}
    	});
    }
}