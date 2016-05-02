<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SensorService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;

class SensorController extends Controller
{
   	protected $sService;

	public function __construct(SensorService $sService)
	{
		$this->middleware('auth');
		$this->sService = $sService;
	}

	public function listarSensores(){
		$lista = $this->sService->getSensores();
		
		return view('listagemSensores', compact('lista'));
	}

}
