<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exploracao extends Model
{
   protected $table = "exploracoes";
   protected $fillable = ['nome','numero','distrito','concelho','freguesia'];

   public function estufas()
   {
   		return $this->hasMany('App\Models\Estufa', 'exploracoes_id', 'id');
   }

}
