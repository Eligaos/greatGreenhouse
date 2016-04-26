<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\HomeService;
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

	public function __construct(HomeService $hService, UserService $uService)
	{
		$this->middleware('auth');
		$this->hService = $hService;
		$this->uService = $uService;
	}

	public function inicio(Request $request){
		$id = Input::except('_token');
		$request->session()->put('exploracaoSelecionada', $id);
		return Redirect::to('admin/home');
	}

	public function home(){
		return view("home");
	}

	public function mudarExploracao(Request $request){
		$request->session()->forget('exploracaoSelecionada');
		 return Redirect::to('admin/exploracoes/listar');
	}

	public function showPerfil() {
		return view('perfil');
	}

	public function editPerfil() {
		return view('perfilEditar');
	}

	public function saveEditPerfil() {
		$user = User::find(Auth::getUser()->id);
		dd($user);
		$input = Input::except('_token');
		if($input['password'] == $input['password_confirmation']){
			$user->name = $input['nome'];
			$user->email = $input['email'];
			$user->cellphone = $input['cellphone'];

			$user->save();
			return Redirect::to('/admin/perfil');
		}		
		return dd($input);
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}
}
