<?php

namespace App\Services;

use App\Models\Leitura;
use Illuminate\Database\Eloquent\Model;

use App\Models\Associacoes;
use App\Models\TipoLeitura;
use App\Models\Exploracao;
use App\Models\Estufa;
use App\Models\Setor;
use App\Models\Sensor;
use Session;
use Carbon\Carbon;
use Redirect;

class LeituraService
{
	public function getLeituras($idExp){ 

		return Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')->join('estufas','setores.estufa_id', '=','estufas.id')->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')->where('exploracoes.id', '=', $idExp)->orderBy('data', 'desc')->paginate(15);
	}


	public function getLastHoursLeiturasFiltered($id, $idExp){ 
		$tudo = [];
		$tipos = TipoLeitura::get();

		for($i=0; $i < count($tipos); $i++){
			$res = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.id as estufa_id' , 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('tipo_leitura.id', '=', $tipos[$i]->id)
			->where('estufas.id','=',$id)
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->take(32)->get();
			if(count($res) != 0){

				array_push($tudo,$res);
			}
		}
		if(count($tudo) == 0){
			$tudo['estufa_id'] = $id;
		}

		return $tudo;
	}


	public function adicionarRegistoManualSubmit($input){
		return Leitura::create(["valor" => $input['valor'], "associacao_id"=>$input['ass_id'], "manual"=>1, "data"=>$input['data']]);
	}


	public function gerarGrafico($idExp,$input){
		$tudo = [];
		if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != ""){


			for($i=0; $i < count($input["tipo_id"]); $i++){
				$res = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
				->where('tipo_leitura.id', '=', $input["tipo_id"][$i])
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('setores.id', '=', $input["setor_id"])
				->where('exploracoes.id', '=', $idExp)
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->orderBy('data', 'desc')
				->get();

				array_push($tudo,$res);

			}

			return $tudo;

		}else if(count($input["tipo_id"]) > 0  && $input["tipo_id"] != ""&& $input["ddEstufa"] != "" && $input["setor_id"] != ""){

			for($i=0; $i < count($input["tipo_id"]); $i++){
				$res = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
				->where('tipo_leitura.id','=', $input["tipo_id"][$i])
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('setores.id', '=', $input["setor_id"])
				->where('exploracoes.id', '=', $idExp)
				->orderBy('data', 'desc')
				->get();
				array_push($tudo,$res);

			}
			return $tudo;
		}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			for($i=0; $i < count($input["tipo_id"]); $i++){
				$res =  Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
				->whereIn('tipo_leitura.id','='  ,$input["tipo_id"][$i])
				->where('estufas.id', '=', $input["ddEstufa"])
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->where('exploracoes.id', '=', $idExp)
				->orderBy('data', 'desc')
				->get();
				array_push($tudo,$res);
			}
			return $tudo;

		}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != ""){

		}else if(count($input["tipo_id"]) == 0){
			return null;
		}
	}




	public function export($idExp)
	{ 
		if(Session::get('filterPesquisa') != null)
		{
			$input = Session::get('filterPesquisa');

			if(count($input)< 5){

				$input["tipo_id"] = [];
			}
			if($input["data_inicial"] != "" &&  $input["data_final"] == ""){

				$input["data_final"] = Carbon::now();
			}


			if(count($input["tipo_id"]) > 0  && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] == "" &&  $input["data_final"] == "" ){

				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->whereIn('tipo_leitura.id', $input["tipo_id"])
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('setores.id', '=', $input["setor_id"])
				->where('exploracoes.id', '=', $idExp)
				->orderBy('data', 'desc')
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();
			}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != "" &&  $input["setor_id"] == ""  &&$input["data_inicial"] != "" &&  $input["data_final"] != "" ){

				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->whereIn('tipo_leitura.id',  $input["tipo_id"])
				->where('estufas.id', '=', $input["ddEstufa"])
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->where('exploracoes.id', '=', $idExp)
				->orderBy('data', 'desc')
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != ""  && $input["setor_id"] == ""  && $input["data_inicial"] == "" &&  $input["data_final"] == "" ){

				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->whereIn('tipo_leitura.id',  $input["tipo_id"])
				->where('exploracoes.id', '=', $idExp)
				->where('estufas.id', '=', $input["ddEstufa"])
				->orderBy('data', 'desc')
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) > 0 && $input["data_inicial"] == ""  && $input["ddEstufa"] == "" && $input["setor_id"] == "" &&  $input["data_final"] == "" ){
				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->whereIn('tipo_leitura.id', $input["tipo_id"])
				->where('exploracoes.id', '=', $idExp)
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) == 0  && $input["setor_id"] == ""  &&  $input["ddEstufa"] != "" && $input["data_inicial"] == "" &&  $input["data_final"] == "" ){
				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('exploracoes.id', '=', $idExp)
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) == 0  && $input["ddEstufa"] == "" && $input["setor_id"] == ""  && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->where('exploracoes.id', '=', $idExp)
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) == 0  &&  $input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->where('exploracoes.id', '=', $idExp)
				->where('estufas.id', '=', $input["ddEstufa"])
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) == 0  &&  $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->where('exploracoes.id', '=', $idExp)
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('setores.id', '=', $input["setor_id"])
				->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}else if(count($input["tipo_id"]) == 0  && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] == "" &&  $input["data_final"] == "" ){

				$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
				->join('setores','associacoes.setor_id', '=','setores.id')
				->join('estufas','setores.estufa_id', '=','estufas.id')
				->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
				->join('sensores','associacoes.sensor_id', '=','sensores.id')
				->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
				->where('estufas.id', '=', $input["ddEstufa"])
				->where('setores.id', '=', $input["setor_id"])
				->where('exploracoes.id', '=', $idExp)
				->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
				->orderBy('Data', 'desc')
				->get()->toArray();

			}

		}else{
			
			$data = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('leituras.data as Data', 'leituras.valor as Valor', 'tipo_leitura.parametro as Tipo', 'tipo_leitura.unidade as Unidade', 'sensores.nome as Sensor', 'estufas.nome as Estufa','setores.nome as Setor', 'leituras.manual as Leitura')
			->where('exploracoes.id', '=', $idExp)
			->orderBy('Data', 'desc')
			->get()->toArray();

		}

		if(isset($data) ){
			
			for ($i=0; $i < count($data); $i++) { 
				if($data[$i]["Leitura"] == 0){
					$data[$i]["Leitura"] = "Automática";
				}else{
					$data[$i]["Leitura"] = "Manual";
				}

				if($data[$i]["Setor"] == "Nenhum"){
					$data[$i]["Setor"] = "Geral";
				}
			}
			if(count($data) != 0){
				$exp = Exploracao::find($idExp);

				return \Excel::create($exp[0]->nome .'_'.Carbon::now()->toDateTimeString(), function($excel) use ($data) {

					$excel->sheet('Folha 1', function($sheet) use ($data)
					{
						$sheet->fromArray($data);
					});
				})->download('xlsx');
			}


		}
		return Redirect::to('admin/leituras');
	}

	public function pesquisar($idExp,$input)
	{
		if(!isset($input["tipo_id"])){
			$input["tipo_id"] = [];
		}
		if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->whereIn('tipo_leitura.id', $input["tipo_id"])
			->where('estufas.id', '=', $input["ddEstufa"])
			->where('setores.id', '=', $input["setor_id"])
			->where('exploracoes.id', '=', $idExp)
			->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;

		}else if(count($input["tipo_id"]) > 0  && $input["ddEstufa"] != "" && $input["setor_id"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->whereIn('tipo_leitura.id', $input["tipo_id"])
			->where('estufas.id', '=', $input["ddEstufa"])
			->where('setores.id', '=', $input["setor_id"])
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if(count($input["tipo_id"]) == 0  && $input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] == "" &&  $input["data_final"] == "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('estufas.id', '=', $input["ddEstufa"])
			->where('setores.id', '=', $input["setor_id"])
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->whereIn('tipo_leitura.id',  $input["tipo_id"])
			->where('estufas.id', '=', $input["ddEstufa"])
			->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;

		}else if(count($input["tipo_id"]) > 0 && $input["ddEstufa"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->whereIn('tipo_leitura.id',  $input["tipo_id"])
			->where('exploracoes.id', '=', $idExp)
			->where('estufas.id', '=', $input["ddEstufa"])
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if(count($input["tipo_id"]) > 0){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->whereIn('tipo_leitura.id', $input["tipo_id"])
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != ""){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('estufas.id', '=', $input["ddEstufa"])
			->where('exploracoes.id', '=', $idExp)
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if($input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('exploracoes.id', '=', $idExp)
			->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')
			->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('exploracoes.id', '=', $idExp)
			->where('estufas.id', '=', $input["ddEstufa"])
			->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}else if($input["ddEstufa"] != "" && $input["setor_id"] != "" && $input["data_inicial"] != "" &&  $input["data_final"] != "" ){
			$lista = Leitura::join('associacoes', 'leituras.associacao_id', '=', 'associacoes.id')
			->join('setores','associacoes.setor_id', '=','setores.id')
			->join('estufas','setores.estufa_id', '=','estufas.id')
			->join('exploracoes', 'estufas.exploracoes_id','=','exploracoes.id')
			->join('sensores','associacoes.sensor_id', '=','sensores.id')->join('tipo_leitura','sensores.tipo_id', '=','tipo_leitura.id')
			->select('sensores.nome as sensor_nome', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade', 'leituras.valor as valor','leituras.data as data','leituras.manual as manual','setores.nome as setor_nome')
			->where('exploracoes.id', '=', $idExp)
			->where('estufas.id', '=', $input["ddEstufa"])
			->where('setores.id', '=', $input["setor_id"])
			->whereBetween("data", array($input["data_inicial"], $input["data_final"]))
			->orderBy('data', 'desc')
			->paginate(15);
			return $lista;
		}
	}
}
