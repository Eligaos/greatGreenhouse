<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;
use App\Services\EstufaService;
use App\Services\AlarmeService;
use App\Services\AssociacoesService;
use Redirect; 



class AlarmeController extends Controller
{
	protected $eService;
	protected $aService;
	protected $assocService;
	protected $exploracaoSelecionada;

	public function __construct( EstufaService $eService, AlarmeService $aService, AssociacoesService $assocService)
	{
		$this->middleware('auth');
		$this->eService = $eService;
		$this->aService = $aService;
		$this->assocService = $assocService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
	}

	function listarAlarmes(){
		$lista = $this->aService->listarAlarmeDistinct($this->exploracaoSelecionada); 
		return view('alarmes.listagemAlarmes', compact('lista'));
	}

	function adicionarAlarme(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		return view('alarmes.adicionarAlarmes', compact('estufas'));
	}


	function adicionarAlarmeSubmit(){
		$input = Input::except('_token');
		$estufa = $this->eService->procurarEstufa($input["ddEstufa"]);
		$assoc =  $this->assocService->getAssociacoesTipo($estufa, $input["ass_id"]);
		$alarme = $this->aService->adicionarAlarmeSubmit($input, $assoc);
		return Redirect::to('/admin/alarmes')->with('message', 'Alarme adicionado com sucesso!');
	}

	function historicoAlarmes(){
		$lista = [];
		return view('alarmes.historicoAlarmes', compact('lista'));
	}
}
