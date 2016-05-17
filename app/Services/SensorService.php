<?php

namespace App\Services;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;

class SensorService
{
	public function getSensores(){ 
		$tudo = [];
		$join = Sensor::join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('sensores.id as sensor_id','tipo_leitura.id as tipo_leitura_id', 'sensores.nome','sensores.modelo','sensores.estado', 'tipo_leitura.parametro')->get();
		array_push($tudo,$join);
		$sensores = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($sensores, $tudo[$i][$j]);
			}
		}
		return $sensores;
	}

	public function adicionar($input){
		return Sensor::create($input);
	}
}

