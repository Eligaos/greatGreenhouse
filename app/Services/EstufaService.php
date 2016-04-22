<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;

class EstufaService 
{
	public function listarEstufas(){ 
		return Estufa::get();
	}

	public function adicionarEstufa($input){
		$exists = Estufa::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
		$estufa = Estufa::create($input);
		//$estufa->save();
		if(count($input)>5){
			$this->adicionarSetor($input,$estufa);
		}
		Setor::create($this->criarEstufaArr("Setor0","Setor Geral",$estufa->id));
		return $estufa;
	}

	public function adicionarSetor($input, $estufa){
		$nomeSetor = $input['nomeSetor'];
		$descricaoSetor = $input['descricaoSetor'];
		foreach($nomeSetor as $key => $n ) 
		{
			Setor::create($this->criarEstufaArr($nomeSetor[$key],$descricaoSetor[$key],$estufa->id));
		}
		return true;		
	}

	public function criarEstufaArr($nomeSetor, $desc, $estufaId){
		$arrData = array( 
			"nome"     		  => $nomeSetor,
			"descricao"       => $desc, 
			"estufa_id"       => $estufaId          
			);
		return $arrData;
	}

	public function detalhesEstufa($id){
		$estufa = Estufa::find($id);
		$setor = Setor::where('estufa_id', $estufa->id)->where('nome','not like','Setor0')->get();
		return [$estufa, $setor];
	}


}
