<?php

namespace App\Services;

use App\Models\SetorTiposLeiturasAssociados;
use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;

class SetorTiposLeiturasAssociadosService
{
	public function getAssociacoes(){ 
		return SetorTiposLeiturasAssociados::get();
	}

	public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

}

