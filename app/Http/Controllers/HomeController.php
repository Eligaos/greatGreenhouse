<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\PerfilRequest;
use App\Services\HomeService;
use App\Services\EstufaService;
use App\Services\CulturaService;
use App\Services\AssociacoesService;
use App\Services\AlarmeService;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Cookie;
use Illuminate\Cookie\CookieJar;
use Redirect;
use Session;
use Auth;

use App\User;

class HomeController extends Controller
{
	protected $hService;
	protected $uService;
	protected $eService;
	protected $cService;
	protected $aService;
	protected $alService;

	protected $exploracaoSelecionada;

	public function __construct(HomeService $hService, UserService $uService, EstufaService $eService, CulturaService $cService, AssociacoesService $aService, AlarmeService $alService)
	{
		$this->middleware('auth');
		$this->hService = $hService;
		$this->uService = $uService;
		$this->eService = $eService;
		$this->cService = $cService;
		$this->aService = $aService;
		$this->alService = $alService;
		$this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
		//$request->session()->forget('filterPesquisa');
		Session::forget('filterPesquisa');


	}

	public function inicio(Request $request){
		$id = Input::except('_token');
		$request->session()->put('exploracaoSelecionada', $id);
		return Redirect::to('admin/home');
	}

	public function home(){
		$estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
		$culturas = $this->cService->listarCulturas($this->exploracaoSelecionada);
		$tipos = $this->aService->getAssociacoesTipos();
		$ocorrencias = $this->alService->getOcorrencias($this->exploracaoSelecionada);
		$estufasID = [];
		foreach ($ocorrencias as $ocorrencia) {
			if(count($estufasID)==0){
				array_push($estufasID, $ocorrencia->estufa_id);	
			}else{
				foreach($estufasID as $id)
				{
					if($ocorrencia->estufa_id != $id){
						array_push($estufasID, $ocorrencia->estufa_id);					
					}			
				}
			}
		}
		return view("home" ,compact('estufas', 'culturas','tipos', 'ocorrencias','estufasID'));
	}

	public function showPerfil() {
		return view('perfil.perfil');
	}

	public function editPerfil() {
		return view('perfil.perfilEditar');
	}


	public function mudarExploracao(Request $request){
		$request->session()->forget('exploracaoSelecionada');
		return Redirect::to('admin/exploracoes/listar');
	}
	
	public function saveEditPerfil(PerfilRequest $request) {

		$user = User::find(Auth::getUser()->id);

		$input = Input::except('_token');
		$errors = array();


		if($input['password'] == $input['password_confirmation']){
			if(count($errors) > 0){
				Session::flash('errors', $errors);
				return Redirect::to('/admin/perfil/editar');
			}

			$user->name = $input['name'];
			$user->email = $input['email'];
			$user->cellphone = $input['cellphone'];
			$user->save();
			return Redirect::to('/admin/perfil');
		}
		return redirect('/admin/perfil/editar')->withInput(Request::except('password','password_confirmation'));
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	public function verAlerta(Request $request){
		$input = $request->input();
		Session::forget('alerta');		
		if($input["verAlerta"]==1){
			return Redirect::to('/admin/home');
		}
	}
}
