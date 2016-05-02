<?php

namespace App\Http\Controllers;
use App\Services\TipoLeituraService;

class TipoLeituraController extends Controller
{

	protected $tlService;

	public function __construct(TipoLeituraService $tlService)
	{
		$this->middleware('auth');
		$this->tlService = $tlService;
	}
    public function listarTiposLeituras(){
	
		return$lista = $this->tlService->getTiposLeitura();
		//return view('listagemTiposLeituras'/*, compact('lista')*/);
		return view('listagemTiposLeituras');
    }
}
