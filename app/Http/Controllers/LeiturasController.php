<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeituraService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;

class LeiturasController extends Controller
{
    protected $lService;

    public function __construct(LeituraService $lService)
    {
        $this->middleware('auth');
        $this->lService = $lService;
    }

	public function listarLeituras(){
		$lista = $this->lService->getLeituras();
		return view('leituras.listagemLeituras', compact('lista'));
	}
    

}
