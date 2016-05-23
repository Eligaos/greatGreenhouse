<?php

namespace App\Services;

use App\Models\Leitura;
use Illuminate\Database\Eloquent\Model;

use App\Models\Associacoes;
use App\Models\TipoLeitura;

use App\Models\Estufa;
use App\Models\Setor;
use App\Models\Sensor;

class LeituraService
{
	public function getLeituras(){ 

 return Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->orderBy('data', 'desc')->paginate(15);



/*
 Leitura::join('associacoes', 'associacoes_id', '=', 'associacoes.id')->join('associacoes','setores.id', '=','associacoes.setor_id')->join('sensores', 'associacoes.sensor_id', '=', 'sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('estufas.id as estufa_id', 'associacoes.id as associacoes_id','sensores.id as sensores_id', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade')->where('estufas.id', '=', $estufas[$i]->id)->get()
*/



/*

 Estufa::join('setores', 'estufas.id', '=', 'setores.estufa_id')->join('associacoes','setores.id', '=','associacoes.setor_id')->join('sensores', 'associacoes.sensor_id', '=', 'sensores.id')->join('tipo_leitura', 'sensores.tipo_id', '=', 'tipo_leitura.id')->select('estufas.id as estufa_id', 'associacoes.id as associacoes_id','sensores.id as sensores_id', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade')->where('estufas.id', '=', $estufas[$i]->id)->get()
*/



		//return Leitura::get();
	}

	public function adicionarRegistoManualSubmit($input){
		return Leitura::create(["valor" => $input['valor'], "associacao_id"=>$input['ass_id'], "manual"=>1, "data"=>$input['data']]);
	}

}

