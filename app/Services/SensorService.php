<?php

namespace App\Services;

use App\Models\Exploracao;
use Illuminate\Database\Eloquent\Model;

class SensorService
{
    protected $sService;

    public function __construct(SensorService $sService)
    {
        $this->middleware('auth');
        $this->sService = $sService;

    }

}

