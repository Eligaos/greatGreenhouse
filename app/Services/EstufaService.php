<?php

namespace App\Services;

use App\Models\Estufa;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Model;



class EstufaService 
{
	public function listarEstufas($idExp){ 
		return Estufa::where('exploracoes_id', '=', $idExp['id'])->get();
	}


	public function getEstufas(){ 
                 //\Debugbar::info(Auth::check());
		return Estufa::all();
	}

	public function adicionarEstufa($idExp, $input){
		$exists = Estufa::where('nome','=',$input['nome'])->first();
		if($exists != null){
			return null;
		}
		//$estufa = Estufa::create($input);
		$estufa = Estufa::create($this->criarEstufaArr($idExp,$input));
		//$estufa->save();
		if(count($input)>5){
			$this->adicionarSetor($input,$estufa);
		}
		Setor::create($this->criarSetorArr("Setor0","Setor Geral",$estufa->id));
		return $estufa;
	}

	public function adicionarSetor($input, $estufa){
		$nomeSetor = $input['nomeSetor'];
		$descricaoSetor = $input['descricaoSetor'];
		foreach($nomeSetor as $key => $n ) 
		{
			Setor::create($this->criarSetorArr($nomeSetor[$key],$descricaoSetor[$key],$estufa->id));
		}
		return true;		
	}

	public function criarEstufaArr($idExp,$input){
		$arrData = array( 
			"nome"     		  => $input['nome'],
			"descricao"       => $input['descricao'], 
			"exploracoes_id"   => $idExp['id']         
			);
		return $arrData;
	}

	public function criarSetorArr($nomeSetor, $desc, $estufaId){
		$arrData = array( 
			"nome"     		  => $nomeSetor,
			"descricao"       => $desc, 
			"estufa_id"       => $estufaId          
			);
		return $arrData;
	}

	public function procurarEstufa($id){ 
		$estufa = Estufa::find($id);
		$setor = Setor::where('estufa_id', $estufa->id)->where('nome','not like','Setor0')->get();
		return [$estufa, $setor];
	}

	public function saveEditExploracao(){ 
		$input = Input::except('_token');        
		$exploracao = $this->eaService->saveEditExploracao($this->idExp, $input);
		if($exploracao){
			return Redirect::to("/admin/exploracoes/detalhes")->with('message', 'Exploração guardada com sucesso!');
		}else{
			return Redirect::to("/admin/exploracoes/editar")->with('message', 'Já existe um Terreno com esse nome');
		}
	}


}
