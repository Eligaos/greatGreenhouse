<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetorTiposLeiturasAssociados extends Model
{
    
	protected $table = "setor_tipos_leituras_associadas";
	protected $fillable = ['tipo_id', 'setor_id'];


	public function leituras()
	{
		//return $this->hasOne('App\Models\Exploracao', 'id' , 'exploracoes_id');
		//estava isto -> return $this->belongsTo('App\Models\Exploracao', 'id' , 'exploracoes_id');
		return $this->belongsTo('App\Models\Exploracao', 'exploracoes_id' , 'id');
	}

		public function setores()
	{
		return $this->hasMany('App\Models\Setor', 'id', 'setor_id');
	}

}
