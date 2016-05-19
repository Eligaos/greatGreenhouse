<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $table = "sensores";
	protected $fillable = ['nome','modelo','area_alcance','estado', 'tipo_id', 'exploracao_id'];


	public function tipo_leitura()
	{
		return $this->belongsTo('App\Models\TipoLeitura', 'tipo_id' , 'id');
	}

	public function exploracoes()
	{
		//return $this->hasOne('App\Models\Exploracao', 'id' , 'exploracoes_id');
		//estava isto -> return $this->belongsTo('App\Models\Exploracao', 'id' , 'exploracoes_id');
		return $this->belongsTo('App\Models\Exploracao', 'exploracao_id' , 'id');
	}

}
