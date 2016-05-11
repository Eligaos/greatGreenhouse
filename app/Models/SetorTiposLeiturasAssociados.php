<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetorTiposLeiturasAssociados extends Model
{
    
	protected $table = "setor_tipos_leituras_associadas";
	protected $fillable = ['tipo_id','leitura_id', 'setor_id'];

}
