<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estufa extends Model
{

	protected $table = "estufas";
	protected $fillable = ['nome','largura','comprimento','exploracoes_id'];

	public function exploracoes()
	{
		return $this->hasOne('App\Models\Exploracao', 'id' , 'exploracoes_id');
	}

	public function setores()
	{
		return $this->hasMany('App\Models\Setor', 'estufa_id', 'id');
	}

}
