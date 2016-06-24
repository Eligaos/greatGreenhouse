<?php

namespace App\Services;


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
		return Alarme::join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->where('estufas.exploracoes_id', '=', $expId)->select('estufas.nome as estufa_nome' , 'tipo_leitura.parametro as parametro', 'alarmes.valor', 'alarmes.regra', 'alarmes.descricao' , 'tipo_leitura.unidade as unidade', 'estufas.id as estufas_id')->distinct('valor','regra','descricao')->get();
	}

	function getOcorrencias($expId){
		$tudo = [];
		$alarmes = $this->listarAlarme($expId);
		foreach ($alarmes as $alarme)
		{			
			foreach ($alarme->leituras as $relation)
			{
				//dd($relation);
				if($relation->pivot->checked==0){
					$associacoes = Alarme::join('ocorrencia_alarme', 'alarmes.id','=', 'ocorrencia_alarme.alarme_id')->join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('leituras','ocorrencia_alarme.leitura_id', '=', 'leituras.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->where('alarmes.id','=', $relation->pivot->alarme_id)->where('leituras.id','=',$relation->pivot->leitura_id)->select('alarmes.id as alarme_id', 'leituras.id as leitura_id', 'leituras.valor as leitura_valor', 'sensores.nome','tipo_leitura.parametro as parametro','estufas.id as estufa_id','tipo_leitura.unidade as unidade' )->get();
					array_push($tudo,$associacoes[0]);
				}
			}

		}
		return $tudo;
	}
}

