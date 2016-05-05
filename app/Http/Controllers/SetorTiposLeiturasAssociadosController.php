<?php

namespace App\Http\Controllers;
use App\Services\SetorTiposLeiturasAssociadosService;
use App\Services\CulturaService;
use Illuminate\Support\Facades\Input;
use App\Models\SetorTiposLeiturasAssociados;
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
		$estufas = $this->cService->getEstufa();
		$tiposLeituras = $this->stlaService->getTiposLeitura();
		return view('associacoesSetorTiposLeituras.adicionarAssociacao', compact('estufas', 'tiposLeituras'));
	}

	public function associarSubmit(){
		
		$input = Input::except('_token');
		$array=[];
		foreach($input as $key => $n ) 
		{
			$estufa = explode("Estufa", $key);
			foreach($input[$key] as $k => $j ) 
			{
			
				//$array[$estufa[1]][$k] = $j;
				// $array[$k] = $j;

				$tp = SetorTiposLeiturasAssociados::create([$j, $estufa[1]]);
			}
		}
		return dd($tp);
	}
	
}
