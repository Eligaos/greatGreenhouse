<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    protected $table = "leituras";
    protected $fillable = ['valor','manual'];

}
