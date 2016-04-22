<?php

namespace App\Services;

use App\Models\Exploracao;
use Illuminate\Database\Eloquent\Model;

class ExploracaoService
{
	public function adicionarExploracao($input){
		$exists = Exploracao::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
		$exploracao = Exploracao::create($input);
		$exploracao->save();
		return $exploracao;
	}


	public function listarExploracao(){ 
		return Exploracao::get();
	}

	public function detalhesExploracao($id){ 
		return Exploracao::find($id);
	}
}
