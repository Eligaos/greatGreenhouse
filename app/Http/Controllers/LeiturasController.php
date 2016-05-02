<?php

namespace App\Http\Controllers;

class LeiturasController extends Controller
{
    protected $lService;

    public function __construct(LeiturasService $lService)
    {

        $this->middleware('auth');
        $this->lService = $lService;
    }
}
