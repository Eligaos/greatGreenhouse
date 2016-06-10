<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

class AlarmeController extends Controller
{
    function listarAlarmes(){
    	$lista = [];
    	return view('alarmes.listagemAlarmes', compact('lista'));
    }
}
