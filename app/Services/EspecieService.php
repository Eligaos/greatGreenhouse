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

}