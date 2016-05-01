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
    protected $idExp;

    public function __construct(ExploracaoService $eaService, Request $request)
    {

        $this->middleware('auth');
        $this->eaService = $eaService;
        $this->idExp = $request->session()->get('exploracaoSelecionada');

    }

    public function adicionar(){ 
        return view("adicionarExploracao");
    }

    public function detalhesExploracao(){
        $exploracao = $this->eaService->procurarExploracao($this->idExp);
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
    
    public function editarExploracao(){ 
        $exploracao = $this->eaService->procurarExploracao($this->idExp);
        return view('editarExploracao', compact('exploracao'));
    }

    public function saveEditExploracao(){ 
        $input = Input::except('_token');        
        $exploracao = $this->eaService->saveEditExploracao($this->idExp, $input);
        if($exploracao){
            return Redirect::to("/admin/exploracoes/detalhes")->with('message', 'Exploração guardada com sucesso!');
        }else{
            return Redirect::to("/admin/exploracoes/editar")->with('message', 'Já existe um Terreno com esse nome');
        }
    }
    
}
