<?php

namespace App\Services;


use App\Models\Associacoes;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setor;
use App\Models\Sensor;
use App\Models\Alarme;
use Session;


class AssociacoesService
{
	public function listarAssociacoes($estufas){ //da exp atual
		$tudo = [];
		for($i=0; $i<count($estufas);$i++){		
			$join = Associacoes::join('setores','associacoes.setor_id', '=', 'setores.id')->join('sensores', 'associacoes.sensor_id', '=', 'sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->join('estufas','setores.estufa_id','=','estufas.id')->select('estufas.id as estufa_id', 'associacoes.id as associacoes_id','sensores.id as sensores_id', 'estufas.nome as estufa_nome', 'setores.nome as setor_nome','tipo_leitura.parametro', 'tipo_leitura.unidade', 'sensores.nome as sensor_nome')->where('estufas.id', '=', $estufas[$i]->id)->get();
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

	public function getAssociacoes($estufa){//para registos manuais
		$tudo = [];
		for($i=0; $i<count($estufa[1]);$i++){
			$ass = Associacoes::join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->where('setor_id', '=', $estufa[1][$i]->id)->select('associacoes.id as associacoes_id','sensores.id as sensores_id','tipo_leitura.parametro', 'tipo_leitura.unidade', 'sensores.nome as sensor_nome')->get();
			array_push($tudo,$ass);
		}
		$associacoes = [];
		for($i=0; $i<count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){									
				array_push($associacoes, $tudo[$i][$j]);
			}
		}
		return $associacoes;
	}


	public function getAssociacoesTipos(){

		$tipos = Associacoes::join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->join('setores','associacoes.setor_id','=','setores.id')->join('estufas','setores.estufa_id','=', 'estufas.id')->where('estufas.exploracoes_id','=',Session::get('exploracaoSelecionada'))->select('estufa_id', 'parametro', 'unidade')->distinct()->get();



		return $tipos;
	}


	public function associarSubmit($input, $alarmes){
		$associacao = Associacoes::create(["setor_id" => $input['setor_id'], 
			"sensor_id"=> $input['sensor_id']]);
		$sensor = Sensor::find($input["sensor_id"]);
		$sensor->estado = 1;
		$sensor->save();
		$tipo = $sensor::join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->join('associacoes', 'sensores.id', '=', 'associacoes.sensor_id')->join('setores','associacoes.setor_id','=','setores.id')->where('tipo_leitura.id', '=', $sensor->tipo_id)->where('sensores.id','=',$sensor->id)->first();
		if(count($alarmes)!=0){
			foreach ($alarmes as $alarme) {
				if($alarme->parametro == $tipo->parametro && $alarme->estufas_id == $tipo->estufa_id){
					$alarmeA = array(
						"associacoes_id" => $associacao->id,
						"regra"	=> $alarme->regra,
						"valor" => $alarme->valor,
						"descricao" => $alarme->descricao
						);
					$saveAlarme = Alarme::create($alarmeA);
				}
			}
		}
		return true;		
	}

	public function getAssociacoesDistinct($estufa){ //da exp atual
		$tudo = [];
		for($i=0; $i<count($estufa[1]);$i++){
			$ass = Associacoes::join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->where('setor_id', '=', $estufa[1][$i]->id)->select('tipo_leitura.parametro', 'tipo_leitura.unidade')->distinct('tipo_leitura.parametro')->get();
			array_push($tudo,$ass);

		}
		$associacoes = [];
		for($i=0; $i<count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){									
				array_push($associacoes, $tudo[$i][$j]);
			}
		}
		return $associacoes;
	}


	public function getAssociacoesTipo($estufa, $parametro){//para registos manuais
		$tudo = [];
		for($i=0; $i<count($estufa[1]);$i++){
			$ass = Associacoes::join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->where('setor_id', '=', $estufa[1][$i]->id)->where('tipo_leitura.parametro','like',$parametro)->select('associacoes.id as associacoes_id')->get();
			array_push($tudo,$ass);
		}
		$associacoes = [];
		for($i=0; $i<count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){									
				array_push($associacoes, $tudo[$i][$j]);
			}
		}
		return $associacoes;
	}

	public function eliminarAssociacoes($id){
		$assoc = Associacoes::find($id);
		$assoc->delete();
	}




}

