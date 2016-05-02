<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLeitura extends Model
{
   protected $table = "tipo_leitura";

   protected $fillable = ['parametro','unidade'];
}
