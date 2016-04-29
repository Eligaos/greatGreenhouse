<?php

namespace App\Services;

use App\Models\Cultura;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;



class CulturaService 
{
	public function listarCulturas($idExp){ 
		return Cultura::all();
	}


	public function getCulturas(){ 
                 //\Debugbar::info(Auth::check());
		return Cultura::all();
	}

	public function adicionarCultura($idExp, $input){
		$exists = Cultura::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
		//$cultura = Cultura::create($input);
		$cultura = Cultura::create($this->criarCulturaArr($idExp,$input));
		//$cultura->save();
		if(count($input)>5){
			$this->adicionarSetor($input,$cultura);
		}
		Setor::create($this->criarSetorArr("Setor 0","Setor Geral",$cultura->id,0));
		return $cultura;
	}
	

	public function criarCulturaArr($idExp,$input){
		$arrData = array( 
			"nome"     		  => $input['nome'],
			"descricao"       => $input['descricao'], 
			"exploracoes_id"   => $idExp['id'],
			);
		return $arrData;
	}


	public function procurarCultura($id){ 
		$cultura = Cultura::find($id);
		$setor = Setor::where('cultura_id', $cultura->id)->where('nome','not like','Setor 0')->get();
		return [$cultura, $setor];
	}
}
