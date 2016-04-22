<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Services\ExploracaoService;
use Redirect;
use Session;
use Auth;

class ExploracaoController extends Controller
{
    protected $eaService;

    public function __construct(ExploracaoService $eaService)
    {
        $this->middleware('auth');
        $this->eaService = $eaService;
    }

    public function adicionar(){ 
        return view("adicionarExploracao");
    }

    public function detalhesExploracao(Request $request){
        $id = $request->session()->get('exploracaoSelecionada');
        $exploracao = $this->eaService->detalhesExploracao($id);
        /**@todo devolve $exploracao dentro de um objeto 
        */
        return view('detalhesExploracao', compact('exploracao'));        
    }

    public function adicionarExploracao(){ 
        $input = Input::except('_token');
        $exists = $this->eaService->adicionarExploracao($input);
        if($exists){
            return Redirect::to("/admin/exploracoes/listar")->with('message', 'Exploração guardada com sucesso!');
        }else{
            return Redirect::to("/admin/exploracoes/adicionar")->with('message', 'Já existe um Terreno com esse nome');
        }
    }

    public function listarExploracao(){ 
    	$lista = $this->eaService->listarExploracao();
        return view('listagemExploracoes', compact('lista'));
    }
}
