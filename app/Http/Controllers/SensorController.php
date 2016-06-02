<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SensorService;
use App\Services\AssociacoesService;
use App\Http\Requests;
use App\Http\Requests\SensorRequest;
use App\Services\TipoLeituraService;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;


class SensorController extends Controller
{
	protected $sService;
	protected $aService;
    protected $tService;
	protected $exploracaoSelecionada;



	public function __construct(SensorService $sService, AssociacoesService $aService, TipoLeituraService $tService)
	{
		$this->middleware('auth');
		$this->sService = $sService;
		$this->aService = $aService;
		$this->tService = $tService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
        Session::forget('filterPesquisa');
	}

	public function listarSensores(){
		$lista = $this->sService->getSensores($this->exploracaoSelecionada);
		return view('sensores.listagemSensores', compact('lista'));
	}

	public function adicionarSensor(SensorRequest $request){
		$tiposLeituras = $this->tService->getTiposLeitura();		
		return view('sensores.adicionarSensor', compact('tiposLeituras'));
	}


	public function adicionarSensorSubmit(){
		$input = Input::except('_token');
		$add = $this->sService->adicionar($input, $this->exploracaoSelecionada);
		return  Redirect::to("/admin/sensores")->with('message', 'Sensor guardado com sucesso!');
	}

	public function detalhesSensor($id){
		$lista = $this->sService->getSensor($id);
		//$lista[0]-- array de culturas  $lista[1]--array dos setores de setores $lista[2]--array de estufas		
		return view('sensores.detalhesSensor', compact('lista'));  		
	}

	public function editarSensor($id){
		$lista = $this->sService->getSensor($id);
		$tiposLeituras = $this->tService->getTiposLeitura();		
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		return view('sensores.editarSensor', compact('lista', 'tiposLeituras'));  		
	}

}
