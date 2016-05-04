<?php
namespace App\Services;
use App\Models\Estufa;
use App\Models\Cultura;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;
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



	public function getEstufas($idExp){ 
		$estufa = Estufa::where("exploracoes_id", "LIKE", $idExp)->get();
		return $estufa;
	}
	public function getSetorByEstufa($idEstufa){ 
		$estufa = Estufa::find($idEstufa);
		$setor = Setor::where("estufa_id", "LIKE", $estufa->id)->where('nome','not like','Setor 0')->get();
		return $setor;
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
}
