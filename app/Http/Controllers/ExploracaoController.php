<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Services\ExploracaoService;
use Redirect;

class ExploracaoController extends Controller
{
    protected $eaService;

    public function __contruct(ExploracaoService $eaService)
    {
    	//$this->middleware('auth');
    	$this->eaService = $eaService;
    }

    public function adicionarExploracao(){
    	$input=Input::except('_token');
    	$this->eaService->adicionarExploracao($input);
    	return "asd";
    	return Redirect::to("/exploracoes/adicionar");
    }
}
