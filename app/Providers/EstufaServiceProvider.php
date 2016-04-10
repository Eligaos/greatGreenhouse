<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EstufaService;

class EstufaServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return new EstufaService;
    }
}
