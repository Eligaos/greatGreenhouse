<?php

namespace App\Services;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;

class SensorService
{
    public function getSensores(){ 
		return Sensor::get();
	}
}

