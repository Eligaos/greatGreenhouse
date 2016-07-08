<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;
use App\Services\EstufaService;
use App\Services\AlarmeService;
use App\Services\AssociacoesService;
use Redirect; 



class AlarmeController extends Controller
{
	protected $eService;
	protected $aService;
	protected $assocService;
	protected $exploracaoSelecionada;

	public function __construct( EstufaService $eService, AlarmeService $aService, AssociacoesService $assocService)
	{
		$this->middleware('auth');
		$this->eService = $eService;
		$this->aService = $aService;
		$this->assocService = $assocService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
	}

	function listarAlarmes(){
		$lista = $this->aService->listarAlarmeDistinct($this->exploracaoSelecionada); 
		/*$lista = [];
		foreach ($alarmes as $alarme) {
			array_push($lista, $alarme);
		}
		
		dd(array_unique($lista));*/
		//dd($lista);
		return view('alarmes.listagemAlarmes', compact('lista'));
	}

	function adicionarAlarme(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		return view('alarmes.adicionarAlarmes', compact('estufas'));
	}

	function adicionarAlarmeSubmit(){
		$input = Input::except('_token');
		$estufa = $this->eService->procurarEstufa($input["ddEstufa"]);
		$assoc =  $this->assocService->getAssociacoesTipo($estufa, $input["ass_id"]);
		$alarme = $this->aService->adicionarAlarmeSubmit($input, $assoc);
		return Redirect::to('/admin/alarmes')->with('message', 'Alarme adicionado com sucesso!');
	}

	
	public function guardarEditarAlarme($id){ 
		$input = Input::except('_token'); 
		$estufaID = (explode(",",$id)[0]);
		$alarmeValor = (explode(",",$id)[1]);
		$alarmeParametro = (explode(",",$id)[2]);
		$alarmeDescricao = (explode(",",$id)[3]);
		$alarmeRegra = (explode(",",$id)[4]);
		$estufaOld = $this->eService->procurarEstufa($estufaID);
		$estufaNew = $this->eService->procurarEstufa($input["ddEstufa"]);
		$assocOld =  $this->assocService->getAssociacoesTipo($estufa, $alarmeParametro);
		$assocNew =  $this->assocService->getAssociacoesTipo($estufa, $input["ass_id"]);
		$alarme = $this->aService->saveEditAlarme($id,$input,$assocOld, $assocNew);
		if($alarme){
			return Redirect::to("/admin/alarmes/detalhes/$id")->with('message', 'Alarme guardado com sucesso!');
		}
	}
	function historicoAlarmes(){
		$lista = $this->aService->historicoAlarmes($this->exploracaoSelecionada);
		return view('alarmes.historicoAlarmes', compact('lista'));
	}

	function detalhesAlarme($id){
		$alarme = $this->aService->getAlarme($id);
		return view('alarmes.detalhesAlarmes', compact('alarme'));
	}

	function editarAlarme($id){
		$estufaID = (explode(",",$id)[0]);
		$alarmeValor = (explode(",",$id)[1]);
		$alarmeParametro = (explode(",",$id)[2]);
		$alarmeDescricao = (explode(",",$id)[3]);
		$alarmeRegra = (explode(",",$id)[4]);
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada); 
		$alarme = $this->aService->getAlarme($id); 

		return view('alarmes.editarAlarmes', compact('estufas','alarmeValor','alarmeParametro','alarmeDescricao','alarmeRegra', 'estufaID'));
	}

	function checkOcorrencia(Request $request){
		$input = $request->input();
		$checked = $this->aService->checkOcorrencia($input);
		return $checked;
	}

	function eliminarAlarme($id){
		$estufaID = (explode(",",$id)[0]);
		$alarmeValor = (explode(",",$id)[1]);
		$alarmeParametro = (explode(",",$id)[2]);
		$alarmeDescricao = (explode(",",$id)[3]);
		$alarmeRegra = (explode(",",$id)[4]);
		$estufa = $this->eService->procurarEstufa($estufaID);
		$alarmes = $this->aService->eliminarAlarmes($estufa, $alarmeValor, $alarmeParametro, $alarmeDescricao, $alarmeRegra);
		return Redirect::to('/admin/alarmes')->with('message', 'Alarme eliminado com sucesso!');
	}
	
}