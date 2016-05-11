<?php
namespace App\Services;
use App\Models\Estufa;
use App\Models\Cultura;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
use Session;
class CulturaService 
{
	public function listarCulturas($estufas){ 
		$tudo = [];
		for($i=0; $i<count($estufas);$i++){		
			$join = Estufa::join('setores', 'estufas.id', '=', 'setores.estufa_id')->join('culturas','setores.id', '=','culturas.setor_id')->select('estufas.id as estufa_id', 'setores.id as setor_id', 'culturas.id as cultura_id', 'estufas.nome as estufa_nome', 'setores.nome as setor_nome', 'culturas.nome as cultura_nome')->where('estufas.id', '=', $estufas[$i]->id)->get();
			array_push($tudo,$join);
		}
		$setores = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($setores, $tudo[$i][$j]);
			}
		}
		return $setores;
	}
	
/*	public function getSetorByCultura($idSetor){ 
		$setor = Setor::find($idSetor);
		return $setor;
	}*/
	public function adicionarCultura($input){ 
		if($input["tipo_cultivo"]=="outro"){
			$input["tipo_cultivo"] = $input["inpOutro"];
			unset($input["tipo_cultivo"]);
		}
		unset($input["inpOutro"]);
		unset($input["ddEstufa"]);
		$input["especie_id"] =null; // por agora o valor é inserido a null porque não existem especies
		return Cultura::create($input);
	}

	public function procurarCultura($id){ 
		$cultura = Cultura::find($id);
		$setor = Setor::where('id','=', $cultura->setor_id)->select('nome','id','estufa_id')->first();
		$estufa = Estufa::where('id','=', $setor->estufa_id)->select('nome','id')->first();

		return [$cultura,$setor,$estufa];
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
		$cultura->save();
		return true;
	}
}