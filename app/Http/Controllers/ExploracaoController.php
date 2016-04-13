<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Services\EstufaService;

class ExploracaoController extends Controller
{
    protected $eaService;

    public function __contruct(EstufaService $eaService)
    {
    	$this->eaService = $eaService;
    }

    public function adicionarExploracao(){
    	$input=Input::except('_token');
    	dd($input);
    	$this->eaService->adicionarExploracao($input);
    }
}
