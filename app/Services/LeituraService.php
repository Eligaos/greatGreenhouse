<?php

namespace App\Services;

use App\Models\Leitura;
use Illuminate\Database\Eloquent\Model;

use App\Models\Associacoes;
use App\Models\TipoLeitura;

use App\Models\Estufa;
use App\Models\Setor;
use App\Models\Sensor;
use Carbon\Carbon;


class LeituraService
{
	public function getLeituras(){ 

		return Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->orderBy('data', 'desc')->paginate(15);
	}

	public function getLastHoursLeituras($id){ 
	            $to = Carbon::now();
	            $from = $to->subHours(8);

		$lista =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome','estufas.id as estufa_id', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id','=','1')->where('estufas.id','=',$id)->whereBetween('leituras.data', array($from, $to))->orderBy('data', 'desc')->get();


			if(count($lista) ==0){
						$lista =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id','=','1')->where('estufas.id','=',$id)->orderBy('data', 'desc')->take(24)->get();
					

			}

			return $lista;
	}

	public function adicionarRegistoManualSubmit($input){
		return Leitura::create(["valor" => $input['valor'], "associacao_id"=>$input['ass_id'], "manual"=>1, "data"=>$input['data']]);
	}

}

