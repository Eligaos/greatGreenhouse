<?php

namespace App\Http\Controllers;
use App\Services\AssociacoesService;
use App\Services\CulturaService;
use App\Services\EstufaService;
use Illuminate\Support\Facades\Input;
use App\Models\Associacoes;
use Redirect;
use Session;

class AssociacoesController extends Controller
{
	protected $aService;
	protected $cService;
	protected $eService;
	protected $exploracaoSelecionada;


	public function __construct(AssociacoesService $aService, CulturaService $cService, EstufaService $eService)
	{
		$this->middleware('auth');
		$this->aService = $aService;
		$this->cService = $cService;
		$this->eService = $eService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');

	}
	
	public function listarAssociacoes(){ #todo-- Fazer apenas para a exploracao atual
		$lista = [];
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		if(count($estufas)!=0){
			$lista = $this->aService->listarAssociacoes($estufas); //collection
		}
		return view('associacoes.listagemAssociacoes', compact('lista', 'estufas'));
	}

	public function associar(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		$tiposLeituras = $this->aService->getTiposLeitura();
		return view('associacoes.adicionarAssociacao', compact('estufas', 'tiposLeituras'));
	}

	public function associarSubmit(){
		$input = Input::except('_token');
		$associar = $this->aService->associarSubmit($input);	
		if($associar){
			return Redirect::to("/admin/associacoes/listar")->with('message', 'Associação guardada com sucesso!');
		}else{
			return Redirect::to("/admin/associacoes/associar")->with('message', 'Associação Existente');
		}
	}
	
}
