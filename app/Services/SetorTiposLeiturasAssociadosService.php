<?php

namespace App\Services;

use App\Models\SetorTiposLeiturasAssociados;
use Illuminate\Database\Eloquent\Model;

class SetorTiposLeiturasAssociadosService
{
	 public function getAssociacoes(){ 
		return SetorTiposLeiturasAssociados::get();
	}

}

