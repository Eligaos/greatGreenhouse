<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\Services\RegisterService;

use Auth;
use Session;
use Redirect;

class RegisterController extends Controller
{
	protected $rService;

	public function __construct(RegisterService $rService)
	{
		//$this->middleware('auth.register');
		$this->rService = $rService;
	}

	public function showRegisterView(){   	
		return view("auth.register");    	
	} 


	public function registerAccount(){ 
		$input=Input::except('_token'); 
		if($this->rService->registerAccount($input)){
			return Redirect::to('/home');
		}else{
			return "erros";
		}
	}


}
