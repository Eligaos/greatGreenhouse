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
		//$estufa = Estufa::where('nome','=',$input['nome'])->first();
		//$setor = new Setor;
		//$estufa->id
		//dd($input['nomeSetor']);
		$nomeSetor = $input['nomeSetor'];
		$descricaoSetor = $input['descricaoSetor'];

		//dd($descricaoSetor);
		foreach($nomeSetor as $key => $n ) 
		{
			Setor::create($this->criarEstufaArr($nomeSetor[$key],$descricaoSetor[$key],$estufa->id));
		}
		return true;
		//Setor::create($arrData);
		//dd($arrData);
		//dd($input['nomeSetor1']);
		/*$nome = "nomeSetor";
		$desc = "descricaoSetor";
		//dd("as{$a}");
		$tudo = count($input);
		$set = count($input)-5;
		if($set !=0){
			for($i=1; $i<$set; $i+2){
				$nome = "nomeSetor{$i}";
				$desc = "descricaoSetor{$i}";
				$setor = array(1=> $nome, 2=>$desc, 3=> $estufa->id);
				dd($input[$setor]);
				$nome = "nomeSetor";
				$desc = "descricaoSetor";
			}
		}*/
		//dd($count);
		//dd(strpos($input, 'nomeSetor'));
		//dd(strpos($input, 'nomeSetor'));
		
	}

	public function criarEstufaArr($nomeSetor, $desc, $estufaId){
		$arrData = array( 
			"nome"     		  => $nomeSetor,
			"descricao"       => $desc, 
			"estufa_id"       => $estufaId          
			);
		return $arrData;
	}


}
