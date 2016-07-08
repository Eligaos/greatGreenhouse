<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Associacoes extends Model
{
	use SoftDeletes;

	protected $table = "associacoes";
	protected $fillable = ['sensor_id', 'setor_id'];
	protected $dates = ['deleted_at'];


	public function setores(){
		return $this->belongsTo('App\Models\Setor', 'setor_id', 'id');
	}

	public function sensor(){
		return $this->belongsTo('App\Models\Sensor', 'sensor_id', 'id');
	}

	public function alarme(){
		return $this->hasOne('App\Models\Alarme', 'sensor_id', 'id');
	}
}
