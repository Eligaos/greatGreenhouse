<?php

namespace App\Http\Controllers;
use App\Services\TipoLeituraService;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\TipoLeituraRequest;
use Redirect;
use Session;

class TipoLeituraController extends Controller
{
	protected $tlService;

	public function __construct(TipoLeituraService $tlService)
	{
		$this->middleware('auth');
		$this->tlService = $tlService;
		Session::forget('filterPesquisa');
	}
	
	public function listarTiposLeituras(){
		$lista = $this->tlService->getTiposLeitura();
		return view('tiposLeituras.listagemTiposLeituras', compact('lista'));
	}

	public function tipoLeitura(){

		return view('tiposLeituras.adicionarTipoLeitura');
	}

	public function criarNovoTipoLeitura(TipoLeituraRequest $request){
		$tl = $this->tlService->adicionarTipoLeitura(Input::except('_token'));
		return Redirect::to("/admin/tipos-leituras")->with('message', 'Tipo de leitura Adicionado com sucesso!');

	}

	public function editarTipoLeitura($id){
		$tipoL = $this->tlService->procurarTl($id);
		return view('tiposLeituras.editarTipoLeitura', compact('tipoL'));
	}

	public function guardarEditarTipoLeitura($id){
		$input = Input::except('_token');    
		$tl = $this->tlService->guardarEditarTipoLeitura($input, $id);
		if($tl){
			return Redirect::to("/admin/tipos-leituras")->with('message', 'Tipo de Leitura guardado com sucesso!');
		}else{
			return Redirect::to("/admin/tipos-leituras/editar/$id")->with('message', 'Já existe um Tipo de Leitura com esse parametro!');
		}
	}
}
