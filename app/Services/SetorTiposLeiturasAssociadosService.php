<?php

namespace App\Services;

use App\Models\SetorTiposLeiturasAssociados;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estufa;
use App\Models\Setor;



class SetorTiposLeiturasAssociadosService
{
	public function getAssociacoes(){ //da exp atual
		return SetorTiposLeiturasAssociados::get();
	}

	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

	public function associarSubmit($input){
		$array=[];
		foreach($input as $key => $n ) 
		{
			$estufa = Estufa::find($key);
			$setor = Setor::where('estufa_id', '=', $estufa->id)->where("nome", "like", "Nenhum")->get();

			
				//$array[$estufa[1]][$k] = $j;
				// $array[$k] = $j;

			$tp = SetorTiposLeiturasAssociados::create($setor->id);
		}

	}

}

