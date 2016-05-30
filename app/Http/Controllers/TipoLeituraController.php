<?php

namespace App\Http\Controllers;
use App\Services\TipoLeituraService;
use Illuminate\Support\Facades\Input;
use Redirect;

class TipoLeituraController extends Controller
{
	protected $tlService;

	public function __construct(TipoLeituraService $tlService)
	{
		$this->middleware('auth');
		$this->tlService = $tlService;
	}
	
	public function listarTiposLeituras(){
		$lista = $this->tlService->getTiposLeitura();
		return view('tiposLeituras.listagemTiposLeituras', compact('lista'));
	}

	public function tipoLeitura(){

		return view('tiposLeituras.adicionarTipoLeitura');
	}

	public function criarNovoTipoLeitura(){
        $exists = $this->tlService->adicionarTipoLeitura(Input::except('_token'));

		if($exists){
			return Redirect::to("/admin/tipos-leituras")->with('message', 'Tipo de leitura Adicionado com sucesso!');
		}else{
			return Redirect::to("/admin/tipos-leituras/adicionar")->with('message', 'Já existe um Tipo de Leitura igual ao inserido!');
		}

	}
}
