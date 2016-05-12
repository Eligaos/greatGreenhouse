<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
	protected $table = "setores";
	protected $fillable = ['nome','descricao', 'estufa_id', 'setor_id'];


	public function estufas()
	{
		return $this->belongsTo('App\Models\Estufa', 'estufa_id', 'id');
		//return $this->hasOne('App\Models\Estufa', 'estufa_id', 'id');
	}

	public function culturas()
	{
		return $this->hasMany('App\Models\Cultura', 'setor_id', 'id');
	}

	public function Associacoes()
	{
		return $this->hasMany('App\Models\Associacoes', 'setor_id', 'id');
	}
}
