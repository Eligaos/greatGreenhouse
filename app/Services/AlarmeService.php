<?php

namespace App\Services;


use App\Models\Alarme;
use Illuminate\Database\Eloquent\Model;




class AlarmeService
{
	function adicionarAlarmeSubmit($input, $associacoes){
		for($i=0; $i<count($associacoes); $i++){
			$alarme = array(
				"associacoes_id" => $associacoes[$i]->associacoes_id,
				"regra"	=> $input["regra"],
				"valor" => $input["valor"],
				"descricao" => $input["descricao"]
			);
			$asd = Alarme::create($alarme);
		}

	}
}

