<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultura extends Model
{
	protected $table = "culturas";
	protected $fillable = ['nome','duracao_ciclo','espaco_entre_linhas','espaco_na_linha','data_inicio_ciclo','data_prevista_fim_ciclo', 'tipo_cultivo','tipo_cultura'];


	public function setores()
		return $this->hasOne('App\Models\Setor', 'setor_id', 'id');
	}


}
