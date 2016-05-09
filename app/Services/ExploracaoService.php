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
		return $exploracao;
	}


	public function listarExploracao(){ 
		return Exploracao::get();
	}

	public function procurarExploracao($id){ 
		return Exploracao::find($id);
	}

	public function saveEditExploracao($id, $input){ 
		$exp = $this->procurarExploracao($id);
		if($exp->nome == $input['nome']){
			$exp->numero = $input['numero'];
			$exp->distrito = $input['distrito'];
			$exp->concelho = $input['concelho'];
			$exp->freguesia = $input['freguesia'];
			$exp->save();
			return true;
		}else{
			$exists = Exploracao::where("nome",'=', $input['nome'])->where("id",'!=',$idC)->first();			
			if($exists==null){
				$exp->nome = $input['nome'];
				$exp->numero = $input['numero'];
				$exp->distrito = $input['distrito'];
				$exp->concelho = $input['concelho'];
				$exp->freguesia = $input['freguesia'];
				$exp->save();
				return true;
			}else{
				return false;				
			}
		}
	}

}

