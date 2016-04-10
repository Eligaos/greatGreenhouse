<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
	protected $table = "setores";
	protected $fillable = ['nome','largura','comprimento', 'estufa_id'];


	public function estufas()
	{
		return $this->hasOne('App\Models\Estufa', 'estufa_id', 'id');
	}

	public function culturas()
	{
		return $this->hasMany('App\Models\Cultura', 'setor_id', 'id');
	}
}
