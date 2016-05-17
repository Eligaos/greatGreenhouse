<?php

namespace App\Services;

use App\Models\Associacoes;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estufa;
use App\Models\Setor;



class AssociacoesService
{
	public function listarAssociacoes($estufas){ //da exp atual
		$tudo = [];
		for($i=0; $i<count($estufas);$i++){		
			$join = Estufa::join('setores', 'estufas.id', '=', 'setores.estufa_id')->join('associacoes','setores.id', '=','associacoes.setor_id')->join('tipo_leitura', 'associacoes.tipo_id', '=', 'tipo_leitura.id')->select('estufas.id as estufa_id', 'associacoes.id as associacoes_id','tipo_leitura.id as tipo_leitura_id', 'estufas.nome as estufa_nome', 'tipo_leitura.parametro', 'tipo_leitura.unidade')->where('estufas.id', '=', $estufas[$i]->id)->get();
			array_push($tudo,$join);
		}
		$associacoes = [];
		for($i=0;$i < count($tudo);$i++){
			for($j=0; $j<count($tudo[$i]); $j++){					
				array_push($associacoes, $tudo[$i][$j]);
			}
		}
		return $associacoes;
	}

	public function getAssociacoes($estufa){
		for($i=0; $i<count($estufa[1]);$i++){
			$ass = Associacoes::where('setor_id', '=', $estufa[1][$i]->id)->get();
		}
		$tipos = [];
		for($i=0; $i<count($ass);$i++){
			$tipo =TipoLeitura::find($ass[$i]->tipo_id);
			array_push($tipos, $tipo);
		}
		return $tipos;
	}


	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

	public function associarSubmit($input){
		$array=[];
		foreach($input as $key => $n ) 
		{
			$estufa = Estufa::find($key);
			$setor = Setor::where('estufa_id', '=', $estufa->id)->where("nome", "like", "Nenhum")->first();
			for($i=0; $i<count($input[$key]); $i++){
				$exists = Associacoes::where('setor_id', '=', $setor->id)->where("tipo_id", '=',$input[$key][$i])->first();
				if($exists != null){
					return false;
				}else{
					$tp = Associacoes::create(["setor_id" => $setor->id, 
						"tipo_id"=> $input[$key][$i]]);
				}
			}
		}
		return true;		
	}
}

