<?php

namespace App\Services;

use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;

class TipoLeituraService
{
    public function getTiposLeitura(){ 
		return TipoLeitura::get();
	}

    public function adicionarTipoLeitura($input){
        $exists = TipoLeitura::where('parametro','=',$input['parametro'])->first();
        if($exists != null){
            return null;
        }

        $tipoLeitura = TipoLeitura::create($input);
        return $tipoLeitura;
    }
}

