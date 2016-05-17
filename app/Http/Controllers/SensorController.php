<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SensorService;
use App\Services\AssociacoesService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;

class SensorController extends Controller
{
	protected $sService;
	protected $aService;


	public function __construct(SensorService $sService, AssociacoesService $aService)
	{
		$this->middleware('auth');
		$this->sService = $sService;
		$this->aService = $aService;

	}

	public function listarSensores(){
		$lista = $this->sService->getSensores();
		return view('sensores.listagemSensores', compact('lista'));
	}

	public function adicionarSensore(){
		$tiposLeituras = $this->aService->getTiposLeitura();		
		return view('sensores.adicionarSensor', compact('tiposLeituras'));
	}


	public function adicionarSensoreSubmit(){
		$input = Input::except('_token');
		$add = $this->sService->adicionar($input);
		return  Redirect::to("/admin/sensores/listar")->with('message', 'Sensor guardado com sucesso!');
	}

}
