<?php

namespace App\Services;

use DB;
use App\Models\Alarme;
use Illuminate\Database\Eloquent\Model;


class AlarmeService
{
	function adicionarAlarmeSubmit($input, $associacoes){
		for($i=0; $i<count($associacoes); $i++){
			$alarme = array(
				"associacoes_id" => $associacoes[$i]->associacoes_id,
				"regra"	=> $input["regra"],
				"valor" => $input["valor"],
				"descricao" => $input["descricao"]
				);
			$saveAlarme = Alarme::create($alarme);
		}
	}

	function listarAlarme($expId){
		return Alarme::join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->where('estufas.exploracoes_id', '=', $expId)->select('estufas.nome as estufa_nome' , 'tipo_leitura.parametro as parametro', 'alarmes.valor', 'alarmes.regra', 'alarmes.descricao' , 'tipo_leitura.unidade as unidade', 'alarmes.id as id', 'estufas.id as estufas_id')->get();
	}

	function listarAlarmeDistinct($expId){
		return Alarme::join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->where('estufas.exploracoes_id', '=', $expId)->where('associacoes.deleted_at','=',NULL)->select('estufas.nome as estufa_nome' , 'tipo_leitura.parametro as parametro', 'alarmes.valor', 'alarmes.regra', 'alarmes.descricao' , 'tipo_leitura.unidade as unidade', 'estufas.id as estufas_id')->distinct('valor','regra','descricao')->get();
	}

	function getOcorrencias($expId){
		$tudo = [];
		$alarmes = $this->listarAlarme($expId);
		foreach ($alarmes as $alarme)
		{			
			foreach ($alarme->leituras as $relation)
			{
				if($relation->pivot->checked==0){
					$associacoes = Alarme::join('ocorrencia_alarme', 'alarmes.id','=', 'ocorrencia_alarme.alarme_id')->join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('leituras','ocorrencia_alarme.leitura_id', '=', 'leituras.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->where('alarmes.id','=', $relation->pivot->alarme_id)->where('leituras.id','=',$relation->pivot->leitura_id)->select('alarmes.id as alarme_id', 'leituras.id as leitura_id', 'leituras.valor as leitura_valor', 'sensores.nome','tipo_leitura.parametro as parametro','estufas.id as estufa_id','tipo_leitura.unidade as unidade', 'leituras.id as leitura_id', 'ocorrencia_alarme.created_at as data', 'setores.nome as setor_nome')->get();
					array_push($tudo,$associacoes[0]);
				}
			}
		}
		return $tudo;
	}

	function historicoAlarmes($expId){
		$tudo = [];
		$alarmes = $this->listarAlarme($expId);
		foreach ($alarmes as $alarme)
		{			
			foreach ($alarme->leituras as $relation)
			{
				$associacoes = Alarme::join('ocorrencia_alarme', 'alarmes.id','=', 'ocorrencia_alarme.alarme_id')->join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('leituras','ocorrencia_alarme.leitura_id', '=', 'leituras.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->where('alarmes.id','=', $relation->pivot->alarme_id)->where('leituras.id','=',$relation->pivot->leitura_id)->select('alarmes.id as alarme_id', 'leituras.id as leitura_id','alarmes.valor as alarme_valor', 'leituras.valor as leitura_valor', 'sensores.nome','tipo_leitura.parametro as parametro','estufas.id as estufa_id','tipo_leitura.unidade as unidade', 'estufas.nome as estufa_nome', 'ocorrencia_alarme.created_at as data', 'setores.nome as setor_nome')->get();
				array_push($tudo,$associacoes[0]);
			}
		}
		return $tudo;
	}

	function getAlarme($id){
		$alarme = Alarme::find($id);
		return Alarme::join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->select('estufas.nome', 'alarmes.regra', 'alarmes.id as alarme_id','alarmes.valor', 'alarmes.descricao', 'tipo_leitura.parametro' , 'tipo_leitura.unidade', 'associacoes.id as associacoes_id','estufas.id as estufa_id')->where('associacoes.id','=', $alarme->associacoes_id)->first();
	}



	public function saveEditAlarme($id, $input, $assocOld, $assocNew){
		dd("ad");	
		
		for($i=0; $i<count($associacoes); $i++){			
			$alarme = Alarme::where('associacoes_id','=',$associacoes[$i]->associacoes_id)->get();			
			$alarme = array(
				"associacoes_id" => $associacoes[$i]->associacoes_id,
				"regra"	=> $input["regra"],
				"valor" => $input["valor"],
				"descricao" => $input["descricao"]
				);
			$saveAlarme = Alarme::create($alarme);
		}
		if($alarme){
			dd($input["ass_id"]		);
			$alarme->associacoes_id = $input["ass_id"];		
			$alarme->regra =  $input["regra"];
			$alarme->valor = $input["valor"];
			$alarme->descricao = $input["descricao"];
			$alarme->save();
			return true;
		}
		return false;
		
	}

	function checkOcorrencia($input){
		$alarme = Alarme::find($input["alarmeID"]);
		foreach ($alarme->leituras as $relation)
		{
			if($relation->pivot->leitura_id == $input["leituraID"]){
				$relation->pivot->checked=1;
				$relation->pivot->save();
				return 1;
			}
		}
		return 1;
	}

	function eliminarAlarmes($estufa, $valor, $parametro, $descricao, $regra){
		$alarmes=[];
		foreach ($estufa[1] as $setor) {
			$alarme = Alarme::join('associacoes','associacoes_id','=','associacoes.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->where('associacoes.setor_id','=',$setor->id)->where('alarmes.regra','=',$regra)->where('alarmes.valor','=',$valor)->where('tipo_leitura.parametro','=',$parametro)->where('alarmes.descricao','=',$descricao)->select('alarmes.id as id')->get();
			array_push($alarmes,$alarme);
		}
		foreach ($alarmes as $a) {
			foreach ($a as $alarme) {
				$alarme->delete();
			}
		}
	}
}

//join('setores','associacoes.setor','=','setores.id')->join('estufas','setores.estufas_id','=','estufas.id')->