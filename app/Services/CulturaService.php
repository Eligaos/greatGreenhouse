<?php
namespace App\Services;
use App\Models\Estufa;
use App\Models\Cultura;
use App\Models\Setor;
use App\Models\Especie;
use Illuminate\Database\Eloquent\Model;
use Session;

class CulturaService 
{
	public function listarCulturas($idExp){ 

		return Estufa::join('setores', 'estufas.id', '=', 'setores.estufa_id')->join('culturas','setores.id', '=','culturas.setor_id')->where('exploracoes_id', '=', $idExp)->select('estufas.id as estufa_id', 'setores.id as setor_id', 'culturas.id as cultura_id', 'estufas.nome as estufa_nome', 'setores.nome as setor_nome', 'culturas.nome as cultura_nome')->get();
	}
	
	public function adicionarCultura($input){ 
		if($input["tipo_cultivo"]=="outro"){
			$input["tipo_cultivo"] = $input["inpOutro"];
			unset($input["tipo_cultivo"]);
		}
		unset($input["inpOutro"]);
		unset($input["ddEstufa"]);
		if($input["especie_id"]==""){
			$input["especie_id"]=null;
		}
		return Cultura::create($input);
	}

	public function procurarCultura($id){ 
		$cultura = Cultura::find($id);
		$setor = Setor::where('id','=', $cultura->setor_id)->select('nome','id','estufa_id')->first();
		$estufa = Estufa::where('id','=', $setor->estufa_id)->select('nome','id')->first();
		$especie = Especie::where('id','=', $cultura->especie_id)->select('nome_comum as nome','id')->first();
		return [$cultura,$setor,$estufa, $especie];
	}

	public function saveEditCultura($input, $idC){
		$cultura = Cultura::find($idC);
		$nome = trim($input["nome"], " ");
		if($nome==$cultura->nome){	
			return $exists = $this->saveCultura($cultura, $input);
		}else{
			$exists = Cultura::where("nome", '=', $nome)->where("id",'!=',$idC)->first();
			if($exists == null){
				$cultura->nome = $nome;
				return $exists = $this->saveCultura($cultura, $input);	
			}else{
				return false;
			}
		}
	}


	public function saveCultura($cultura, $input){
		if($input["tipo_cultivo"]=="outro"){
			$cultura->tipo_cultivo = $input["inpOutro"];
		}else{
			$cultura->tipo_cultivo = $input["tipo_cultivo"];
		}
		$cultura->tipo_cultura = $input["tipo_cultura"];		
		$cultura->data_inicio_ciclo = $input["data_inicio_ciclo"];
		$cultura->data_prevista_fim_ciclo = $input["data_prevista_fim_ciclo"];
		$cultura->duracao_ciclo = $input["duracao_ciclo"];
		$cultura->espaco_na_linha = $input["espaco_na_linha"];
		$cultura->espaco_entre_linhas = $input["espaco_entre_linhas"];
		$cultura->setor_id = $input["setor_id"];
		if($input["especie_id"]==""){
			$cultura->especie_id = null;
		}else{
			$cultura->especie_id = $input["especie_id"];
		}
		$cultura->save();
		return true;
	}
}