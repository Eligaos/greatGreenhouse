<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estufa extends Model
{

	protected $table = "estufas";
	protected $fillable = ['nome','descricao','exploracoes_id'];

	public function exploracoes()
	{
		//return $this->hasOne('App\Models\Exploracao', 'id' , 'exploracoes_id');
		//estava isto -> return $this->belongsTo('App\Models\Exploracao', 'id' , 'exploracoes_id');
		return $this->belongsTo('App\Models\Exploracao', 'exploracoes_id' , 'id');
	}

	public function setores()
	{
		return $this->hasMany('App\Models\Setor', 'estufa_id', 'id');
	}

}
