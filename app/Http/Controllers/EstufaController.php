<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\EstufaService;

class EstufaController extends Controller
{
	protected $eService;

    public function __contruct(EstufaService $eService)
    {
    	$this->middleware('auth');
    	$this->eService = $eService;
    }
}
