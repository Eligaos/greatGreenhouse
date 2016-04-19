<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\HomeService;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Response;
use Cookie;
use Illuminate\Cookie\CookieJar;


class HomeController extends Controller
{
	protected $hService;

	public function __construct(HomeService $hService)
	{
    	//$this->middleware('auth'); meter quando login
		$this->hService = $hService;
	}

	public function home(){
		$response = new Response;
		$request = new Request;
		$exploracao=Input::except('_token');
		//$response->withCookie(cookie('exploracao', 'my value', $input));
		//dd($request->cookie('exploracao'));
		//dd(view('home', $input));
		return view('home', compact('exploracao'));
		//dd($request('ex'));
		//$this->eaService->adicionarExploracao($input);
	}
}
