<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeituraService;
use App\Services\AssociacoesService;
use App\Services\TipoLeituraService;
use App\Services\EstufaService;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;


class LeituraController extends Controller
{
    protected $lService;
    protected $tService;
    protected $aService;
    protected $eService;
    protected $exploracaoSelecionada;
    protected $filterPesquisa;




    public function __construct(LeituraService $lService, EstufaService $eService, TipoLeituraService $tService, AssociacoesService $aService)
    {
        $this->middleware('auth');
        $this->lService = $lService;
        $this->tService = $tService;
        $this->eService = $eService;
        $this->aService = $aService;
        $this->exploracaoSelecionada = Session::get('exploracaoSelecionada');
        $this->filterPesquisa = Session::get('filterPesquisa');
    }

    public function listarLeituras(){ 
      $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
      $tiposLeituras = $this->tService->getTiposLeitura();
      if($this->filterPesquisa==null){
        $lista = $this->lService->getLeituras($this->exploracaoSelecionada);
        return view('leituras.listagemLeituras', compact('lista','estufas', 'tiposLeituras'));
    }else{
        $estufas = $this->eService->getEstufasPesquisa($this->exploracaoSelecionada);
        $lista = $this->lService->pesquisar($this->exploracaoSelecionada, $this->filterPesquisa);
        return view('leituras.listagemLeituras' ,compact('lista','estufas', 'tiposLeituras'));
    }
}

    public function getAssociacoes($estufaID){//para o js do registoManual
        $estufa = $this->eService->procurarEstufa($estufaID);
        $tipos = $this->aService->getAssociacoes($estufa);
        return $tipos;
    }

    public function adicionarRegistoManual(){
        $lista = [];
        $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
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

   public function pesquisar(Request $request){
    $input = Input::except('_token');
    $estufas = $this->eService->getEstufas($this->exploracaoSelecionada);
    $tiposLeituras = $this->tService->getTiposLeitura();
    if(isset($input["limpar"]) && $input["limpar"] != 0){
        Session::forget('filterPesquisa');
        $lista = $this->lService->getLeituras($this->exploracaoSelecionada);        
        return view('leituras.listagemLeituras', compact('lista','estufas', 'tiposLeituras'));        
    }else{
        $lista = $this->lService->pesquisar($this->exploracaoSelecionada, $input);
        $request->session()->put('filterPesquisa', $input);
        return view('leituras.listagemLeituras', compact('lista','estufas', 'tiposLeituras'));
    }
}


}