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
	public function getLeituras($idExp){ 

		return Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
	}

	public function getLastHoursLeituras($id, $idExp){ 

			/*  $to = Carbon::now();
		            $from = $to->subHours(8);
	$lista =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome','estufas.id as estufa_id', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id','=','1')->where('estufas.id','=',$id)->whereBetween('leituras.data', array($from, $to))->orderBy('data', 'desc')->get();


	if(count($lista) ==0){*/

		$lista1 =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->whereIn('tipo_leitura.id',  [1])->where('estufas.id','=',$id)->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->take(32)->get();



		$lista2 =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->whereIn('tipo_leitura.id', [2])->where('estufas.id','=',$id)->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->take(32)->get();


		$lista3 =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->whereIn('tipo_leitura.id', [3])->where('estufas.id','=',$id)->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->take(32)->get();




		$lista4 =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->whereIn('tipo_leitura.id', [4])->where('estufas.id','=',$id)->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->take(32)->get();

		return [$lista1, $lista2, $lista3];
	}




	public function getLastHoursLeiturasFiltered($id, $idExp){ 


		$tudo = [];
		$tipos = TipoLeitura::get();
		

		
		for($i=0; $i < count($tipos); $i++){
			$res = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $tipos[$i]->id)->where('estufas.id','=',$id)->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->take(32)->get();
			array_push($tudo,$res);

		}

		return $tudo;

	}
	

	public function adicionarRegistoManualSubmit($input){
		return Leitura::create(["valor" => $input['valor'], "associacao_id"=>$input['ass_id'], "manual"=>1, "data"=>$input['data']]);
	}

	public function pesquisar($idExp,$input){
		if($input["tipo_id"] != "" && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $input["tipo_id"])->where('estufas.id', '=', $input["ddEstufa"])->where('setores.id', '=', $input["setor_id"])->where('exploracoes.id', '=', $idExp)->whereBetween("data", array($input["data_inicial"], $input["data_final"]))->orderBy('data', 'desc')->paginate(15);
			return $lista;

		}else if($input["tipo_id"] != "" && $input["ddEstufa"] != "" && $input["setor_id"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $input["tipo_id"])->where('estufas.id', '=', $input["ddEstufa"])->where('setores.id', '=', $input["setor_id"])->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["tipo_id"] != "" && $input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $input["tipo_id"])->where('estufas.id', '=', $input["ddEstufa"])->whereBetween("data", array($input["data_inicial"], $input["data_final"]))->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
			return $lista;

		}else if($input["tipo_id"] != "" && $input["ddEstufa"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $input["tipo_id"])->where('exploracoes.id', '=', $idExp)->where('estufas.id', '=', $input["ddEstufa"])->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["tipo_id"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('tipo_leitura.id', '=', $input["tipo_id"])->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('estufas.id', '=', $input["ddEstufa"])->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('exploracoes.id', '=', $idExp)->whereBetween("data", array($input["data_inicial"], $input["data_final"]))->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('exploracoes.id', '=', $idExp)->where('estufas.id', '=', $input["ddEstufa"])->whereBetween("data", array($input["data_inicial"], $input["data_final"]))->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('exploracoes.id', '=', $idExp)->where('estufas.id', '=', $input["ddEstufa"])->where('setores.id', '=', $input["setor_id"])->whereBetween("data", array($input["data_inicial"], $input["data_final"]))->orderBy('data', 'desc')->paginate(15);
			return $lista;
		}
	}
}
