<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = "sensores";
    protected $fillable = ['nome','modelo','area_alcance','estado', 'tipo_id'];


    	public function tipo_leitura()
	{
		return $this->belongsTo('App\Models\TipoLeitura', 'tipo_id' , 'id');
	}

}
