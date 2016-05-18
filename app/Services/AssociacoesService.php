<?php

namespace App\Services;

use App\Models\Associacoes;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estufa;
use App\Models\Setor;
use App\Models\Sensor;



class AssociacoesService
{
	public function listarAssociacoes($estufas){ //da exp atual
		$tudo = [];
		for($i=0; $i<count($estufas);$i++){		
			$join = Estufa::join('setores', 'estufas.id', '=', 'setores.estufa_id')->join('associacoes','setores.id', '=','associacoes.setor_id')->join('sensores', 'associacoes.sensor_id', '=', 'sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('estufas.id as estufa_id', 'associacoes.id as associacoes_id','sensores.id as sensores_id', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade')->where('estufas.id', '=', $estufas[$i]->id)->get();
			array_push($tudo,$join);
		}
		$associacoes = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($associacoes, $tudo[$i][$j]);
			}
		}
		return $associacoes;
	}

	public function getAssociacoes($estufa){
		for($i=0; $i<count($estufa[1]);$i++){
			$ass = Associacoes::where('setor_id', '=', $estufa[1][$i]->id)->get();
		}
		$tipos = [];
		for($i=0; $i<count($ass);$i++){
			$tipo =TipoLeitura::find($ass[$i]->tipo_id);
			array_push($tipos, $tipo);
		}
		return $tipos;
	}


	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

	public function associarSubmit($input){
		$tp = Associacoes::create(["setor_id" => $input['setor_id'], 
						"sensor_id"=> $input['sensor_id']]);
		$sensor = Sensor::find($input["sensor_id"]);
		$sensor->estado = 1;
		$sensor->save();
		return true;		
	}
}

