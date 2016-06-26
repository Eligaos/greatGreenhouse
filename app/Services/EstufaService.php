<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
use Session;

class EstufaService
{

  public function getEstufas($idExp){
    return Estufa::where('exploracoes_id', '=', $idExp['id'])->paginate(15);
  }

  public function getEstufasPesquisa($idExp){
    return Estufa::where('exploracoes_id', '=', $idExp['id'])->get();
  }

  public function criarSetorArr($nomeSetor, $desc, $estufaId){
    $arrData = array(
      "nome"     		  => $nomeSetor,
      "descricao"       => $desc,
      "estufa_id"       => $estufaId
      );
    return $arrData;
  }

  public function procurarEstufa($idEstufa){ 
    $estufa = Estufa::find($idEstufa);
    $setor = Setor::where("estufa_id", "LIKE", $estufa->id)->get();
    return [$estufa, $setor];
  }

  public function procurarEstufaSemSetorGeral($idEstufa){ 
    $estufa = Estufa::find($idEstufa);
    $setor = Setor::where("estufa_id", "LIKE", $estufa->id)->where('nome','not like','Nenhum')->get();
    return [$estufa, $setor];
  }


  public function getSetores($idEstufa){ 
    $setores = Setor::where("estufa_id", "LIKE", $estufa->id)->get();
    return $setores;
  }


  public function adicionarEstufa($idExp, $input){
    $estufa = Estufa::create([
      "nome"=> $input['nome'],
      "descricao"       => $input['descricao'],
      "exploracoes_id"   => $idExp['id']
      ]);

    if(count($input)>5){
      $this->adicionarSetores($input,$estufa);
    }
    Setor::create($this->criarSetorArr("Nenhum","Setor Geral",$estufa->id,0));
    return $estufa;
  }

  public function adicionarSetores($input, $estufa){
    $nomeSetor = $input['nomeSetor'];
    $descricaoSetor = $input['descricaoSetor'];
    foreach($nomeSetor as $key => $n ) 
    {
     Setor::create($this->criarSetorArr($nomeSetor[$key],$descricaoSetor[$key],$estufa->id));
   }
   return true;		
 }


 public function saveEditEstufa($input, $idE){

  $estufa = $this->procurarEstufaSemSetorGeral($idE);
  if($estufa[0]->nome == $input['nome']){
    $estufa[0]->descricao = $input['descricao'];
            if(count($estufa[1])==0){ //se estufa não tem setores;
              if(isset($input["nomeSetor"]) && count($input["nomeSetor"])>0){
                $this->adicionarSetores($input,$estufa[0]);
              }
            }else{//quando a estufa tem setores
                if(isset($input["nomeSetor"]) && count($input["nomeSetor"])>0){ //se foram enviados setores
                  for($i=0; $i<count($input["nomeSetor"]);$i++){    
                    if(!isset($estufa[1][$i])){
                      if($input["idSetor"][$i] == ""){
                        Setor::create($this->criarSetorArr($input["nomeSetor"][$i],$input['descricaoSetor'][$i],$estufa[0]->id));
                      }
                    }else{
                      if($input["idSetor"][$i] == ""){
                        Setor::create($this->criarSetorArr($input["nomeSetor"][$i],$input['descricaoSetor'][$i],$estufa[0]->id));
                      }else if($input["idSetor"][$i] == $estufa[1][$i]->id){
                        $estufa[1][$i]->nome =$input['nomeSetor'][$i];
                        $estufa[1][$i]->descricao =$input['descricaoSetor'][$i];
                        $estufa[1][$i]->save();
                      }
                    }
                  }
                  for($i=0; $i<count($estufa[1]);$i++) {
                    if(in_array($estufa[1][$i]->id, $input["idSetor"])){
                     continue;
                   }else{
                     $estufa[1][$i]->destroy($estufa[1][$i]->id);
                   }
                 }
               }else{
                if(count($input["idSetor"]) == 1){
                       for($i=0; $i<count($estufa[1]);$i++){ //elimina tudo se guardar sem setores
                         $estufa[1][$i]->destroy($estufa[1][$i]->id);
                       }
                     }
                   }
                 }
                 $estufa[0]->save();
               }
               return $estufa[0];
             }
           }
