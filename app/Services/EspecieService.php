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
				return $exists = $this->saveEspecie($especie, $input);	
			}else{
				return false;
			}
		}
	}

	public function saveEspecie($especie, $input){
		$especie->nome_comum = $input["nome_comum"];		
		$especie->especie = $input["especie"];
		$especie->cultivar = $input["cultivar"];
		$especie->ph_solo_ideal = $input["ph_solo_ideal"];
		$especie->ph_agua_ideal = $input["ph_agua_ideal"];
		$especie->temperatura_atmosferica_ideal = $input["temperatura_atmosferica_ideal"];
		$especie->temperatura_solo_ideal = $input["temperatura_solo_ideal"];
		$especie->condutividade_electrica_solo_ideal = $input["condutividade_electrica_solo_ideal"];
		$especie->tipo_fisionomico = $input["tipo_fisionomico"];
		$especie->habitat = $input["habitat"];
		$especie->epoca_floracao = $input["epoca_floracao"];
		$especie->coleccao_termica = $input["coleccao_termica"];
		$especie->save();
		return true;
	}

}