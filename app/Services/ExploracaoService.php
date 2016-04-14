<?php

namespace App\Services;

use App\Models\Exploracao;
use Illuminate\Database\Eloquent\Model;

class ExploracaoService
{
	public function adicionarExploracao($input){
	    $exists = Exploracao::where('nome','=',$input['nome'])->first();
	    if($exists != null){
	    	return $exists;
	    }
		$exploracao = Exploracao::create($input);
		$exploracao->save();
		return $exploracao;
	}
}
