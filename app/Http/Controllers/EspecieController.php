<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EspecieService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;

class EspecieController extends Controller
{
	protected $espService;
	protected $exploracaoSelecionada;

	public function __construct(EspecieService $espService)
	{
		$this->middleware('auth');
		$this->espService = $espService;
	}
	public function listarEspecies(){
		$especies = $this->espService->getEspecies();
		return view('especies.listagemEspecies', compact('especies'));
	}


	public function adicionar(){
		return view('especies.adicionarEspecie');
	}


	public function adicionarEspecie(){
		$input = Input::except('_token');
		$exists = $this->espService->criarEspecie($input);
		return Redirect::to("admin/especies")->with('message', 'Espécie guardada com sucesso!');
	}


	public function detalhesEspecie($id){ 
		$especie =  $this->espService->getEspecie($id);
		return view('especies.detalhesEspecie', compact('especie'));
	}

	public function editarEspecie($id){ 
		$especie =  $this->espService->getEspecie($id);
		return view('especies.editarEspecie', compact('especie'));
	}

	public function saveEditEspecie($id){ 
		$input = Input::except('_token');  
 
		$especie = $this->espService->saveEditEspecie($input, $id);
		if($especie){
			return Redirect::to("/admin/especies/detalhes/$id")->with('message', 'Espécie guardada com sucesso!');
		}else{
			return Redirect::to("/admin/especies/editar/$id")->withInput()->with('message', 'Já existe uma Espécie com esse nome');
		}
	}
}
