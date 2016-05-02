<?php

namespace App\Http\Controllers;
use App\Services\SetorTiposLeiturasAssociadosService;
use Illuminate\Support\Facades\Input;
use Redirect;

class SetorTiposLeiturasAssociadosController extends Controller
{
	protected $stlaService;

	public function __construct(SetorTiposLeiturasAssociadosService $stlaService)
	{
		$this->middleware('auth');
		$this->stlaService = $stlaService;
	}
		
	public function listarAssociacoes(){
		$lista = $this->stlaService->getAssociacoes();
		return view('associacoesSetorTiposLeituras.listagemAssociacoes', compact('lista'));
	}

	public function adicionarAssociacao(){

	}
	
}
