<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
	protected $table = "leituras";
	protected $fillable = ['valor','manual', 'associacao_id', 'data'];


	public function associacoes(){
		return $this->belongsTo('App\Models\Associacoes', 'associacao_id', 'id');
	}

	public function alarmes(){
		return $this->belongsToMany('App\Models\Alarme', 'ocorrencia_alarme')->withTimestamps();
	}
}
