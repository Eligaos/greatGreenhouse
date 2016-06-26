<?php

namespace App\Services;

use App\Models\Exploracao;
use Illuminate\Database\Eloquent\Model;

class ExploracaoService
{
	public function adicionarExploracao($input){

		return Exploracao::create($input);
	}


	public function listarExploracao(){
		return Exploracao::paginate(5);
	}

	public function procurarExploracao($id){ 
		return Exploracao::find($id)->first();
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
			$exists = Exploracao::where("nome",'=', $input['nome'])->where("id",'!=',$id)->first();			
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

