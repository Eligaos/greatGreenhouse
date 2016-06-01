<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeituraService;
use App\Services\AssociacoesService;
use App\Services\EstufaService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;


class LeituraController extends Controller
{
    protected $lService;
    protected $aService;
    protected $eService;
    protected $exploracaoSelecionada;




    public function __construct(LeituraService $lService, EstufaService $eService, AssociacoesService $aService)
    {
        $this->middleware('auth');
        $this->lService = $lService;
        $this->aService = $aService;
        $this->eService = $eService;
        $this->exploracaoSelecionada = Session::get('exploracaoSelecionada');

    }

    public function listarLeituras(){
      $lista = $this->lService->getLeituras($this->exploracaoSelecionada);
      $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
      $tiposLeituras = $this->aService->getTiposLeitura();
      return view('leituras.listagemLeituras', compact('lista','estufas', 'tiposLeituras'));
  }

    public function getAssociacoes($estufaID){//para o js do registoManual
        $estufa = $this->eService->procurarEstufa($estufaID);
        $tipos = $this->aService->getAssociacoes($estufa);
        return $tipos;
    }

    public function adicionarRegistoManual(){
        $lista = [];
        $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
        if(count($estufas)!=0){
          //  $lista = $this->aService->listarAssociacoes($estufas); //collection
        }
        return view('leituras.adicionarRegistoManual' , compact('lista', 'estufas'));
    }

    public function adicionarRegistoManualSubmit(){//fazer request
        $input = Input::except('_token');
        $add = $this->lService->adicionarRegistoManualSubmit($input);
        return Redirect::to("/admin/leituras")->with('message', 'Registo guardado com sucesso!');
    }

    public function getLastHoursLeituras($id){

       return $this->lService->getLastHoursLeituras($id);
       
   }

   public function pesquisar(){
    $input = Input::except('_token');
    $lista = $this->lService->pesquisar($this->exploracaoSelecionada, $input);
    $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
    $tiposLeituras = $this->aService->getTiposLeitura();
    return view('leituras.listagemLeituras', compact('lista','estufas', 'tiposLeituras'));
}


}