<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
use Session;

class EstufaService 
{
	public function getEstufas(){ 
		$exploracaoSelecionada = Session::get('exploracaoSelecionada');
		return Estufa::where('exploracoes_id', '=', $exploracaoSelecionada['id'])->get();
	}

	public function adicionarEstufa($idExp, $input){
		$exists = Estufa::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
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

	public function criarSetorArr($nomeSetor, $desc, $estufaId){
		$arrData = array( 
			"nome"     		  => $nomeSetor,
			"descricao"       => $desc, 
			"estufa_id"       => $estufaId
			);
		return $arrData;
	}

	public function procurarEstufa($id){ 
		$estufa = Estufa::find($id);
		$setor = Setor::where('estufa_id', $estufa->id)->where('nome','not like','Nenhum')->get();
		return [$estufa, $setor];
	}

//Editar Estufa e Sector TODO Setor
	public function saveEditEstufa($idExp, $input, $idE){ 
		$estufa = $this->procurarEstufa($idE);
	/*	$nomeSetor = $input['nomeSetor'];
	$descricaoSetor = $input['descricaoSetor'];*/
	if($estufa[0]->nome == $input['nome']){
		$estufa[0]->descricao = $input['descricao'];
		if(count($estufa[1])==0){ //se estufa não tem setores;
			if(count($input)>5){
				$this->adicionarSetores($input,$estufa[0]);
			}
		}else{//quando a estufa tem setores
			if(count($input)>5){ //se foram enviados setores
				for($i=0; $i<count($input["nomeSetor"]);$i++){	
					if(!isset($estufa[1][$i])){
						if($input["idSetor"][$i] == ""){
							Setor::create($this->criarSetorArr($input["nomeSetor"][$i],$input['descricaoSetor'][$i],$estufa[0]->id));		
						}				
					}else{
						if($input["idSetor"][$i] == $estufa[1][$i]->id){	
							$estufa[1][$i]->nome =$input['nomeSetor'][$i];
							$estufa[1][$i]->descricao =$input['descricaoSetor'][$i];
							$estufa[1][$i]->save();		
						}else{//BUG NO ELIMINAR!!	
							$estufa[1][$i+1]->destroy($estufa[1][$i+1]->id);					
						}
					}
				}
			}else{
				for($i=0; $i<count($estufa[1]);$i++){ //elimina tudo se guardar sem setores
					$estufa[1][$i]->destroy($estufa[1][$i]->id);
				}
			}
		}

			//$estufa[0]->save();
	}
	return $estufa[0];
}
}
