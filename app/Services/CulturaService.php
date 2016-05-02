<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Cultura;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;



class CulturaService 
{
	public function listarCulturas($idExp){ 
		$estufa = Estufa::where("exploracoes_id", "LIKE", $idExp)->get();
		for($i=0; $i<count($estufa);$i++){
			$setor = Setor::where("estufa_id", "LIKE", $estufa[$i]->id)->get();
		}
		for($i=0; $i<count($setor);$i++){
			$cultura = Cultura::where("setor_id", "LIKE", $setor[$i]->id)->get();
		}
		return $cultura;
	}


	public function getEstufa($idExp){ 
		$estufa = Estufa::where("exploracoes_id", "LIKE", $idExp)->get();
		return $estufa;
	}


	public function getSetor($idEstufa){ 
		$estufa = Estufa::find($idEstufa);
		$setor = Setor::where("estufa_id", "LIKE", $estufa->id)->where('nome','not like','Setor 0')->get();
		return $setor;
	}

	public function adicionarCultura($input){ 
		dd($input);
		/*$exists = Cultura::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}*/
		return $estufa = Cultura::create($input);
		//return $setor;
	}
}
