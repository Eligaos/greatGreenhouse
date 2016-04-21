<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ExploracaoService;


class ExploracaoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return new ExploracaoService;
    }
}
