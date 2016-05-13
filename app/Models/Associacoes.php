<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associacoes extends Model
{
    
	protected $table = "associacoes";
	protected $fillable = ['tipo_id', 'setor_id'];


	public function leituras()
	{
		//return $this->hasOne('App\Models\Exploracao', 'id' , 'exploracoes_id');
		//estava isto -> return $this->belongsTo('App\Models\Exploracao', 'id' , 'exploracoes_id');
		return $this->belongsTo('App\Models\Leitura', 'exploracoes_id' , 'id');
	}

	public function setores(){
		return $this->belongsTo('App\Models\Setor', 'setor_id', 'id');
	}

}
