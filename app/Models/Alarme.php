<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alarme extends Model
{
	protected $table = "alarmes";
	protected $fillable = ['associacoes_id','regra','valor','descricao'];


	public function associacoes()
	{
		return $this->belongsTo('App\Models\associacoes', 'associacoes_id', 'id');
	}
	
	public function leituras(){
		return $this->belongsToMany('App\Models\Leitura', 'ocorrencia_alarme')->withPivot(['checked'])->withTimestamps();
	}	
	
}
