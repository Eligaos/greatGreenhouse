<?php

namespace App\Services;

use App\Models\Leitura;
use Illuminate\Database\Eloquent\Model;

class LeituraService
{
	public function getLeituras(){ 
		return Leitura::get();
	}


}

