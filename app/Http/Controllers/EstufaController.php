<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EstufaRequest;
use App\Services\EstufaService;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class EstufaController extends Controller
{
	protected $eService;
	protected $exploracaoSelecionada;

	public function __construct(EstufaService $eService)
	{
		$this->middleware('auth');
		$this->eService = $eService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
		Session::forget('filterPesquisa');
		
	}

	public function adicionar(){
		return view("estufas.adicionarEstufa");		
	}

	public function listarEstufas(){ 
		$lista = $this->eService->getEstufas($this->exploracaoSelecionada);
		return view('estufas.listagemEstufas', compact('lista'));
	}


	public function adicionarEstufa(EstufaRequest $request){     	
		$input = Input::except('_token');
		$this->eService->adicionarEstufa($this->exploracaoSelecionada, $input);

		return Redirect::to("/admin/estufas")->with('message', 'Estufa guardada com sucesso!');
		
	}

	public function detalhesEstufa($id){
		$lista = $this->eService->procurarEstufa($id);
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		return view('estufas.detalhesEstufa', compact('lista'));  		
	}

	public function editarEstufa($id){
		$lista = $this->eService->procurarEstufaSemSetorGeral($id);
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		return view('estufas.editarEstufa', compact('lista'));  		
	}

	public function saveEditEstufa($idE){ 

		$input = Input::except('_token');
		$estufa = $this->eService->saveEditEstufa($input, $idE);
		if($estufa){
			return Redirect::to("/admin/estufas/detalhes/{$estufa->id}")->with('message', 'Estufa editada com sucesso!');
		}else{
			return Redirect::to("/admin/estufas/editar/{$estufa->id}")->with('message', 'Já existe um Terreno com esse nome')->withInput();
		}
	}

	public function getSetores($idEstufa){
		$setores = $this->eService->getSetores($idEstufa);
		return $setores;	
	}
}
