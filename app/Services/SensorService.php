<?php

namespace App\Services;

use App\Models\Sensor;
use Illuminate\Database\Eloquent\Model;

class SensorService
{

    public function __construct(SensorService $sService)
    {
        $this->middleware('auth');
        $this->sService = $sService;

    }

}

