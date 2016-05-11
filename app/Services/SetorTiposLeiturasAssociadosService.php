<?php

namespace App\Services;

use App\Models\SetorTiposLeiturasAssociados;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;

class SetorTiposLeiturasAssociadosService
{
	public function getAssociacoes(){ //da exp atual
		return SetorTiposLeiturasAssociados::get();
	}

	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

}

