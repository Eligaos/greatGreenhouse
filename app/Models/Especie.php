<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
	protected $table = "especies";
	protected $fillable = ['nome_comum','especie',
							'cultivar','tipo_fisionomico',
							'habitat','epoca_floracao',
							'coleccao_termica','ph_solo_ideal',
							'ph_agua_ideal','temperatura_atmosferica_ideal',
							'temperatura_solo_ideal','condutividade_electrica_solo_ideal'
						   ];
}
