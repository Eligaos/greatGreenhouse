<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cultura extends Model
{
	protected $table = "culturas";
	protected $fillable = ['nome','tipo_cultura', 'tipo_cultivo', 'data_inicio_ciclo','data_prevista_fim_ciclo', 'duracao_ciclo','espaco_na_linha', 'espaco_entre_linhas', 'setor_id', 'especie_id'];


	public function setores(){
		return $this->belongsTo('App\Models\Setor', 'setor_id', 'id');
	}

	public function especie(){
		return $this->belongsTo('App\Models\Especie', 'especie_id', 'id');
	}


}
