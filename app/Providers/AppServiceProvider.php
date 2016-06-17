<?php
namespace App\Providers;

use App\Models\Leitura;
use App\Models\Alarme;
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
     Leitura::created(function($leitura){
        $ocorrencia = Leitura::join('alarmes', 'leituras.associacao_id', '=', 'alarmes.associacoes_id')->where('leituras.id','=',$leitura->id)->select('leituras.id as id', 'alarmes.associacoes_id','alarmes.regra', 'alarmes.valor as alarme_valor', 'leituras.valor as leituras_valor', 'alarmes.id as alarme_id')->get();
        for($i=0; $i<count($ocorrencia);$i++){
            if($ocorrencia[$i]->regra == "<"){
                if($ocorrencia[$i]->leituras_valor < $ocorrencia[$i]->alarme_valor){
                    $ocorrencia[$i]->attachLeituraToAlarme($ocorrencia[$i]->alarme_id);
                }
            }else{
                if($ocorrencia[$i]->leituras_valor > $ocorrencia[$i]->alarme_valor){
                    $ocorrencia[$i]->attachLeituraToAlarme($ocorrencia[$i]->alarme_id);
                }
            }
        }

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