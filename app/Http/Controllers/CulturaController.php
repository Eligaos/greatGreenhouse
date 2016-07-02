<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CulturaRequest;
use App\Services\CulturaService;
use App\Services\EstufaService;
use App\Services\EspecieService;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;


class CulturaController extends Controller
{
	protected $cService;
	protected $eService;
	protected $espService;
	protected $exploracaoSelecionada;

	public function __construct(CulturaService $cService, EstufaService $eService, EspecieService $espService)
	{
		$this->middleware('auth');
		$this->cService = $cService;
		$this->eService = $eService;
		$this->espService = $espService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
        Session::forget('filterPesquisa');
		
	}
	public function adicionar(){
		$lista = $this->eService->getEstufas($this->exploracaoSelecionada);
		$especies = $this->espService->getEspecies();
		return view("culturas.adicionarCultura", compact('lista', 'especies'));		
	}
	public function getSetorByEstufa($idEstufa){
		$lista = $this->eService->procurarEstufa($idEstufa);//$estufas[0] --> lista de estufas ; $estufas[1]--> lista de setores da estufa
		return $lista;	
	}

	public function listarCulturas(){ 
		
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		if(count($estufas)!=0){
			$lista = $this->cService->listarCulturas($this->exploracaoSelecionada); //collection
		}		
		return view('culturas.listagemCulturas', compact('lista', 'estufas'));
	}

	public function adicionarCultura(CulturaRequest $request){   
		$input = Input::except('_token');
		//dd($input);
		$exists = $this->cService->adicionarCultura($input);
		return Redirect::to("admin/culturas")->with('message', 'Cultura guardada com sucesso!');
	}

	public function detalhesCultura($id){
		$lista = $this->cService->procurarCultura($id);
		//$lista[0]-- array de culturas  $lista[1]--array dos setores de setores $lista[2]--array de estufas	
		return view('culturas.detalhesCultura', compact('lista'));  		
	}

	public function editarCultura($id){
		$lista = $this->cService->procurarCultura($id);
		//$lista[0]-- array de estufa  $lista[1]--array dos setores da estufa
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada); //todas as estufas da exploracao
		$especies = $this->espService->getEspecies();		
		return view('culturas.editarCultura', compact('lista', 'estufas', 'especies'));  		
	}
	
	public function saveEditCultura($idC){ 
		$input = Input::except('_token');    
		$cultura = $this->cService->saveEditCultura($input, $idC);
		if($cultura){
			return Redirect::to("/admin/culturas/detalhes/$idC")->with('message', 'Cultura guardada com sucesso!');
		}else{
			return Redirect::to("/admin/culturas/editar/$idC")->with('message', 'Já existe uma Cultura com esse nome!')->withInput();
		}
	}
}
