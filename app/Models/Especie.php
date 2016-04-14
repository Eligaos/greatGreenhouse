<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
	protected $table = "exploracoes";
	protected $fillable = ['nome_comum','especie',
							'cultivar','tipo_fisionomico',
							'habitat','epoca_floracao',
							'coleccao_termica','ph_solo_ideal',
							'ph_agua_ideal','temperatura_atmosferica_min',
							'temperatura_atmosferica_max','temperatura_solo_min',
							'temperatura_solo_max','condutividade_electrica_solo_ideal'
						   ];
}
