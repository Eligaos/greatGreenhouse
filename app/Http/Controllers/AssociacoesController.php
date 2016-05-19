<?php

namespace App\Http\Controllers;
use App\Services\AssociacoesService;
use App\Services\CulturaService;
use App\Services\EstufaService;
use App\Services\SensorService;
use Illuminate\Support\Facades\Input;
use App\Models\Associacoes;
use Redirect;
use Session;

class AssociacoesController extends Controller
{
	protected $aService;
	protected $cService;
	protected $eService;
	protected $sService;
	protected $exploracaoSelecionada;


	public function __construct(AssociacoesService $aService, CulturaService $cService, EstufaService $eService, SensorService $sService)
	{
		$this->middleware('auth');
		$this->aService = $aService;
		$this->cService = $cService;
		$this->eService = $eService;
		$this->sService = $sService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');

	}
	
	public function listarAssociacoes(){
		$lista = [];
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		if(count($estufas)!=0){
			$lista = $this->aService->listarAssociacoes($estufas); //collection
			$estufas = 1;
			$sensores = $this->checkSensores();
		}else{
			$estufas = 0;
			$sensores = $this->checkSensores();
		}


		return view('associacoes.listagemAssociacoes', compact('lista', 'estufas', 'sensores'));
	}

	public function associar(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		$sensores = $this->sService->getSensoresInativos();
		$tiposLeituras = $this->aService->getTiposLeitura();
		return view('associacoes.adicionarAssociacao', compact('estufas', 'tiposLeituras', 'sensores'));
		
	}

	public function associarSubmit(){
		$input = Input::except('_token');
		$associar = $this->aService->associarSubmit($input);	
		return Redirect::to("/admin/associacoes/listar")->with('message', 'Associação guardada com sucesso!');
	}

	public function checkSensores(){
		$sensores = $this->sService->getSensores();
		if(count($sensores)!=0){
			return 1;
		}else{
			return 0;
		}
	}
	
}
