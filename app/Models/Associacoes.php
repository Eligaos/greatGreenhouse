<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associacoes extends Model
{

	protected $table = "associacoes";
	protected $fillable = ['sensor_id', 'setor_id'];


	public function setores(){
		return $this->belongsTo('App\Models\Setor', 'setor_id', 'id');
	}

	public function tipoLeitura(){
		return $this->belongsTo('App\Models\Sensor', 'sensor_id', 'id');
	}

}
