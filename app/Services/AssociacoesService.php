<?php

namespace App\Services;

use App\Models\Associacoes;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estufa;
use App\Models\Setor;



class AssociacoesService
{
	public function getAssociacoes(){ //da exp atual
		return Associacoes::get();
	}

	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

	public function associarSubmit($input){
		$array=[];
		foreach($input as $key => $n ) 
		{
			$estufa = Estufa::find($key);
			$setor = Setor::where('estufa_id', '=', $estufa->id)->where("nome", "like", "Nenhum")->first();
			for($i=0; $i<count($input[$key]); $i++){
				$tp = Associacoes::create(["setor_id" => $setor->id, 
					"tipo_id"=> $input[$key][$i]]);
			}
		}
	}
}

