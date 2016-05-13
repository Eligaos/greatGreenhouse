<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    protected $table = "leituras";
    protected $fillable = ['valor','manual', 'tipo_id', 'associacao_id'];


    public function associacoes(){
		return $this->belongsTo('App\Models\Associacoes', 'associacao_id', 'id');
	}

	public function tipoLeitura(){
		return $this->belongsTo('App\Models\TipoLeitura', 'tipo_id', 'id');
	}


}
