<?php

namespace App\Services;

use App\Models\Leitura;
use Illuminate\Database\Eloquent\Model;

class LeituraService
{
	public function getLeituras(){ 
		return Leitura::get();
	}

	public function adicionarRegistoManualSubmit($input){
		return Leitura::create(["valor" => $input['valor'], "associacao_id"=>$input['ass_id'], "manual"=>1]);
	}

}

