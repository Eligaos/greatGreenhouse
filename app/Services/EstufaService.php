<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;



class EstufaService 
{
	public function listarEstufas($idExp){ 
		return Estufa::where('exploracoes_id', '=', $idExp['id'])->get();
	}


	public function getEstufas(){ 
                 //\Debugbar::info(Auth::check());
		return Estufa::all();
	}

	public function adicionarEstufa($idExp, $input){
		$exists = Estufa::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
		//$estufa = Estufa::create($input);
		$estufa = Estufa::create($this->criarEstufaArr($idExp,$input));
		//$estufa->save();
		if(count($input)>5){
			$this->adicionarSetor($input,$estufa);
		}
		Setor::create($this->criarSetorArr("Setor 0","Setor Geral",$estufa->id,0));
		return $estufa;
	}

	public function adicionarSetor($input, $estufa){
		$nomeSetor = $input['nomeSetor'];
		$descricaoSetor = $input['descricaoSetor'];
		foreach($nomeSetor as $key => $n ) 
		{
			Setor::create($this->criarSetorArr($nomeSetor[$key],$descricaoSetor[$key],$estufa->id, $key+1));
		}
		return true;		
	}

	public function criarEstufaArr($idExp,$input){
		$arrData = array( 
			"nome"     		  => $input['nome'],
			"descricao"       => $input['descricao'], 
			"exploracoes_id"   => $idExp['id'],
			);
		return $arrData;
	}

	public function criarSetorArr($nomeSetor, $desc, $estufaId,$setor_id){
		$arrData = array( 
			"nome"     		  => $nomeSetor,
			"descricao"       => $desc, 
			"estufa_id"       => $estufaId,
			"setor_id"        =>$setor_id			          
			);
		return $arrData;
	}

	public function procurarEstufa($id){ 
		$estufa = Estufa::find($id);
		$setor = Setor::where('estufa_id', $estufa->id)->where('nome','not like','Setor0')->get();
		return [$estufa, $setor];
	}

//Editar Estufa e Sector TODO Setor
	public function saveEditEstufa($idExp, $input, $idE){ 
		$estufa = $this->procurarEstufa($idE);
	/*	$nomeSetor = $input['nomeSetor'];
	$descricaoSetor = $input['descricaoSetor'];*/
	if($estufa[0]->nome == $input['nome']){
		$estufa[0]->descricao = $input['descricao'];
		if(count($estufa[1])==0){
			if(count($input)>5){
				$this->adicionarSetor($input,$estufa[0]);
			}
		}else{
			for($i=0; $i<count($estufa[1]);$i++){				
				if($input["nomeSetor"][$i]==$estufa[1][$i]->nome){
					dd($input);

					dd($estufa[1][$i]->setor_id);

				}
			}
		}
			//$estufa[0]->save();
	}
	return $estufa[0];
}
}
