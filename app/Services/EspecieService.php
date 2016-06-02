<?php
namespace App\Services;

use App\Models\Especie;
use Illuminate\Database\Eloquent\Model;


class EspecieService 
{
	public function getEspecies(){ 
		return Especie::paginate(15);
	}
	

	public function criarEspecie($input){ 

		return Especie::create($input);
	}


	public function getEspecie($id){ 
		$especie = Especie::find($id);
		return $especie;
	}


	public function saveEditEspecie($input, $id){
		$especie = Especie::find($id);
		$nome = trim($input['nome_comum'], " ");
		if($nome == $especie->nome){	
			return false;
		}else{
			$exists = Especie::where("nome_comum", '=', $nome)->where("id",'!=',$id)->first();
			if($exists == null){
				$especie->nome_comum = $nome;
				return $exists = $this->saveEspecie($cultura, $input);	
			}else{
				return false;
			}
		}
	}

	public function saveEspecie($especie, $input){

		$especie->tipo_cultura = $input["tipo_cultura"];		
		$especie->data_inicio_ciclo = $input["data_inicio_ciclo"];
		$especie->data_prevista_fim_ciclo = $input["data_prevista_fim_ciclo"];
		$especie->duracao_ciclo = $input["duracao_ciclo"];
		$especie->espaco_na_linha = $input["espaco_na_linha"];
		$especie->espaco_entre_linhas = $input["espaco_entre_linhas"];
		$especie->setor_id = $input["setor_id"];
		$cultura->save();
		return true;
	}

}