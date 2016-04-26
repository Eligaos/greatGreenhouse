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

	public function procurarExploracao($id){ 
		return Exploracao::find($id);
	}

	public function saveEditExploracao($id, $input){ 
		$exp = $this->procurarExploracao($id);
		if($exp[0]->nome == $input['nome']){
			$exp[0]->numero = $input['numero'];
			$exp[0]->distrito = $input['distrito'];
			$exp[0]->concelho = $input['concelho'];
			$exp[0]->freguesia = $input['freguesia'];
           // $exp[0]->area = $input['area'];
			$exp[0]->save();
			return true;
		}else{
			$exists = Exploracao::where("nome",'=', $input['nome'])->get()->first();
			//dd($exists[0]->id);
			if($exists==null){
				$exp[0]->nome = $input['nome'];
				$exp[0]->numero = $input['numero'];
				$exp[0]->distrito = $input['distrito'];
				$exp[0]->concelho = $input['concelho'];
				$exp[0]->freguesia = $input['freguesia'];
				$exp[0]->save();
				return true;
			}else{
				return false;				
			}
		}
	}

}

