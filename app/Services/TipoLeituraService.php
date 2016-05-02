<?php

namespace App\Services;

use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;

class TipoLeituraService
{
    public function getTiposLeitura(){ 
		return TipoLeitura::all();
	}
}

