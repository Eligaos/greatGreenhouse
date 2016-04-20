<?php

namespace App\Services;

use App\Models\Estufa;
use Illuminate\Database\Eloquent\Model;

class EstufaService 
{
    public function listarEstufas(){ 
		return Estufa::get();
	}
}
