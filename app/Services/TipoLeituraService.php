<?php

namespace App\Services;

use App\Models\Exploracao;
use Illuminate\Database\Eloquent\Model;

class TipoLeituraService
{
    protected $tlService;

    public function __construct(TipoLeituraService $tlService)
    {
        $this->middleware('auth');
        $this->tlService = $tlService;

    }

}

