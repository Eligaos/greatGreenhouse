<?php

namespace App\Http\Controllers;
use App\Services\AssociacoesService;
use App\Services\CulturaService;
use App\Services\EstufaService;
use App\Services\TipoLeituraService;
use App\Services\SensorService;
use App\Services\AlarmeService;
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
	protected $alService;
	protected $exploracaoSelecionada;


	public function __construct(AssociacoesService $aService, CulturaService $cService, EstufaService $eService, SensorService $sService, TipoLeituraService $tService, AlarmeService $alService)
	{
		$this->middleware('auth');
		$this->aService = $aService;
		$this->alService = $alService;
		$this->cService = $cService;
		$this->eService = $eService;
		$this->sService = $sService;
		$this->tService = $tService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
		Session::forget('filterPesquisa');
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
		$tiposLeituras = $this->tService->getTiposLeitura();
		return view('associacoes.adicionarAssociacao', compact('estufas', 'tiposLeituras', 'sensores'));
		
	}

	public function getAssociacoesEstufa($estufa, $assoc){

		return $this->aService->getAssociacoesEstufa($estufa, $assoc);

	}

	

	public function associarSubmit(){
		$input = Input::except('_token');
		$alarmes = $this->alService->listarAlarmeDistinct($this->exploracaoSelecionada);
		$associar = $this->aService->associarSubmit($input, $alarmes);	
		return Redirect::to("/admin/associacoes")->with('message', 'Associação guardada com sucesso!');
	}

	public function checkSensores(){
		$sensores = $this->sService->getSensores($this->exploracaoSelecionada);
		if(count($sensores)!=0){
			return 1;
		}else{
			return 0;
		}
	}
	
}
