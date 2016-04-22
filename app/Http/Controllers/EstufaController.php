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

	public function __construct(EstufaService $eService)
	{
		$this->middleware('auth');
		$this->eService = $eService;
	}

	public function listarEstufas(){ 
		$lista = $this->eService->listarEstufas();
                 //\Debugbar::info(Auth::check());
		return view('listagemEstufas', compact('lista'));
	}

	public function adicionarEstufa(){     	
		$input = Input::except('_token');
		$exists = $this->eService->adicionarEstufa($input);
		if($exists){
			return Redirect::to("admin/estufas/listar")->with('message', 'Estufa guardada com sucesso!');
		}else{
			return Redirect::to("/admin/estufas/adicionar")->with('message', 'Já existe uma Estufa com esse nome');
		}
	}



}
