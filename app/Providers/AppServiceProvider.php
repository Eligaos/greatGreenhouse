<?php
namespace App\Providers;

use App\Models\Leitura;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    /* Leitura::created(function($leitura){
        $ocorrencia = Leitura::join('alarmes', 'leituras.associacao_id', '=', 'alarmes.associacoes_id')->where('leituras.id','=',$leitura->id)->get();
        dd($leitura);*/

    });

 }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}