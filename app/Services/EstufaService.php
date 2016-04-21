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
		//$estufa = Estufa::create($input);
		//$estufa->save();
		$this->adicionarSetor($input);
		return $estufa;
	}

	public function adicionarSetor($input){
		$estufa = Estufa::where('nome','=',$input['nome'])->first();
		//$setor = new Setor;
		//$estufa->id
		//dd($input['nomeSetor']);
		if($input){
			$nomeSetor = $input['nomeSetor'];
			$descricaoSetor = $input['descricaoSetor'];

		//dd($descricaoSetor);
			foreach($nomeSetor as $key => $n ) 
			{
				$arrData = array( 
					"nome"     		  => $nomeSetor[$key],
					"descricao"       => $descricaoSetor[$key], 
					"estufa_id"       => $estufa->id          
					);

			//dd($arrData);
				Setor::create($arrData);
			}
		}
		dd("hey");
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
}
