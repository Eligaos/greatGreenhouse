<?php

namespace App\Http\Controllers;

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

class HomeController extends Controller
{
	protected $hService;

	public function __construct(HomeService $hService)
	{
		$this->middleware('auth');
		$this->hService = $hService;
	}




	public function home(){
		$response = new Response;
		$request = new Request;



		$exploracao=Input::except('_token');

		/*$HEY = $request->session()->put('exploracaoSelecionada', $exploracao);
		dd($HEY);
		$val = $request->session()->get('exploracaoSelecionada');
		dd($val);*/
		//dd(view('home', $input));
		//return view('home', compact('exploracao'));
		
		/*$cookie = Cookie::make('cExploracao', $exploracao);

		$val = Cookie::get('cExploracao');*/

		//dd($val);
		//$input=Input::except('_token');
		$response->withCookie(cookie('exploracao', $exploracao , 60));
		//dd($response);
		//$request->cookie('exploracao');
		//dd($request);

		return view("home", compact($exploracao));

		//dd($request('ex'));
		//$this->eaService->adicionarExploracao($input);
	}

	 public function showCookie(Request $request) {
	 	$val = $request->cookie('exploracao');
	 	dd($val);
	 	$key = array_search('id', $val);
	 	dd($key);
        return $key;
    } 

    public function showPerfil() {
	    return view('perfil');
    }

    public function logout() {
	 	Auth::logout();
		return Redirect::to('/');
    }

}
