<?php

namespace App\Http\Controllers;
use App\Services\SetorTiposLeiturasAssociadosService;
use App\Services\CulturaService;
use Illuminate\Support\Facades\Input;
use Redirect;

class SetorTiposLeiturasAssociadosController extends Controller
{
	protected $stlaService;
	protected $cService;
	public function __construct(SetorTiposLeiturasAssociadosService $stlaService, CulturaService $cService)
	{
		$this->middleware('auth');
		$this->stlaService = $stlaService;
		$this->cService = $cService;
	}
		
	public function listarAssociacoes(){
		$lista = $this->stlaService->getAssociacoes();
		return view('associacoesSetorTiposLeituras.listagemAssociacoes', compact('lista'));
	}

	public function associar(){
		$lista = $this->cService->getEstufa();
		return view('associacoesSetorTiposLeituras.adicionarAssociacao', compact('lista'));

	}
	
}
