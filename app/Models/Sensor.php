<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = "sensores";
    protected $fillable = ['nome','modelo','area_alcance','estado'];

}
