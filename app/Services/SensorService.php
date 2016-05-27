<?php

namespace App\Services;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;

class SensorService
{
	public function getSensores($exploracaoId){ 
		$tudo = [];
		$join = Sensor::join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('sensores.id as sensor_id','tipo_leitura.id as tipo_leitura_id', 'sensores.nome','sensores.modelo','sensores.estado', 'tipo_leitura.parametro')->where('sensores.exploracao_id', '=', $exploracaoId['id'])->get();
		array_push($tudo,$join);
		$sensores = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($sensores, $tudo[$i][$j]);
			}
		}
		return $sensores;
	}

	public function adicionar($input, $exploracaoId){
		return Sensor::create(["nome" => $input['nome'],
			"modelo" => $input['modelo'], 
			"area_alcance" =>$input['area_alcance'], 
			"tipo_id" => $input['tipo_id'],
			"exploracao_id" => $exploracaoId['id']]);
	}

	public function getSensoresInativos(){
		$tudo = [];
		$join = Sensor::join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('sensores.id as sensor_id','tipo_leitura.id as tipo_leitura_id', 'sensores.nome','sensores.modelo','sensores.estado', 'tipo_leitura.parametro')->where('sensores.estado', '=', 0)->get();
		array_push($tudo,$join);
		$sensores = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($sensores, $tudo[$i][$j]);
			}
		}
		return $sensores;
	}

	public function getSensor($id){
		$tudo = [];
		$join = Sensor::join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('sensores.id as sensor_id','tipo_leitura.id as tipo_leitura_id', 'sensores.nome as nome','sensores.modelo','sensores.estado', 'tipo_leitura.parametro', 'sensores.area_alcance')->where('sensores.id', '=', $id)->get();
		array_push($tudo,$join);
		$sensores = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($sensores, $tudo[$i][$j]);
			}
		}
		return $sensores;
	}
}

