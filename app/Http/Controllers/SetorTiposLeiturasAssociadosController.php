<?php

namespace App\Http\Controllers;
use App\Services\SetorTiposLeiturasAssociadosService;
use App\Services\CulturaService;
use App\Services\EstufaService;
use Illuminate\Support\Facades\Input;
use App\Models\SetorTiposLeiturasAssociados;
use Redirect;
use Session;

class SetorTiposLeiturasAssociadosController extends Controller
{
	protected $stlaService;
	protected $cService;
	protected $eService;
	protected $exploracaoSelecionada;


	public function __construct(SetorTiposLeiturasAssociadosService $stlaService, CulturaService $cService, EstufaService $eService)
	{
		$this->middleware('auth');
		$this->stlaService = $stlaService;
		$this->cService = $cService;
		$this->eService = $eService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');

	}
	
	public function listarAssociacoes(){ #todo-- Fazer apenas para a exploracao atual
		$lista = $this->stlaService->getAssociacoes();
		return view('associacoesSetorTiposLeituras.listagemAssociacoes', compact('lista'));
	}

	public function associar(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		$tiposLeituras = $this->stlaService->getTiposLeitura();
		return view('associacoesSetorTiposLeituras.adicionarAssociacao', compact('estufas', 'tiposLeituras'));
	}

	public function associarSubmit(){
		
		$input = Input::except('_token');


		$array=[];
		foreach($input as $key => $n ) 
		{
			$estufa = Estufa::where('nome', 'like', $key)->first();
			dd($estufa);

			$setor = Setor::where('estufa_id', '=', $estufa[1]);
			
				//$array[$estufa[1]][$k] = $j;
				// $array[$k] = $j;

			$tp = SetorTiposLeiturasAssociados::create([$j, $estufa[1]]);
		}


	}
	
}
