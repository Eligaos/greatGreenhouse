<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alarme extends Model
{
	use SoftDeletes;

	protected $table = "alarmes";
	protected $fillable = ['associacoes_id','regra','valor','descricao'];
	protected $dates = ['deleted_at'];


	public function associacoes()
	{
		return $this->belongsTo('App\Models\associacoes', 'associacoes_id', 'id');
	}
	
	public function leituras(){
		return $this->belongsToMany('App\Models\Leitura', 'ocorrencia_alarme')->withPivot(['checked'])->withTimestamps();
	}	
	
}
