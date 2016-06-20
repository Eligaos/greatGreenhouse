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
			$asd = Alarme::create($alarme);
		}

	}

	function listarAlarme($expId){
		return Alarme::join('associacoes', 'alarmes.associacoes_id', '=', 'associacoes.id')->join('setores', 'associacoes.setor_id', '=' ,'setores.id')->join('estufas', 'setores.estufa_id','=', 'estufas.id')->join('sensores','associacoes.sensor_id','=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=', 'tipo_leitura.id')->where('estufas.exploracoes_id', '=', $expId)->select('estufas.nome as estufa_nome' , 'tipo_leitura.parametro as parametro', 'alarmes.valor', 'alarmes.regra', 'alarmes.descricao' , 'tipo_leitura.unidade as unidade')->get();
	}

	function getOcorrencias($estufas){
		
	}
}

