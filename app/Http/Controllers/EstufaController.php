<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\EstufaService;
use Illuminate\Support\Facades\Input;
use Redirect;

class EstufaController extends Controller
{
	protected $eService;
	protected $idExp;

	public function __construct(EstufaService $eService, Request $request)
	{
		$this->idExp = $request->session()->get('exploracaoSelecionada');
		$this->middleware('auth');
		$this->eService = $eService;
	}

	public function adicionar(){
		return view("adicionarEstufa");		
	}

	public function listarEstufas(){ 
		$lista = $this->eService->listarEstufas($this->idExp);
                 //\Debugbar::info(Auth::check());
		return view('listagemEstufas', compact('lista'));
	}


	public function adicionarEstufa(){     	
		$input = Input::except('_token');
		$exists = $this->eService->adicionarEstufa($this->idExp, $input);
		if($exists){
			return Redirect::to("admin/estufas/listar")->with('message', 'Estufa guardada com sucesso!');
		}else{
			return Redirect::to("/admin/estufas/adicionar")->with('message', 'Já existe uma Estufa com esse nome');
		}
	}

	public function detalhesEstufa($id){
		$lista = $this->eService->detalhesEstufa($id);
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		return view('detalhesEstufa', compact('lista'));  		
	}

	public function editarEstufa($id){
		$lista = $this->eService->detalhesEstufa($id);
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		return view('editarEstufa', compact('lista'));  		
	}
}
