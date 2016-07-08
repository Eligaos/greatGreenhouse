<?php
namespace App\Providers;
use App\Models\Leitura;
use App\Models\Alarme;
use Illuminate\Support\ServiceProvider;
use Session;
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
        $ocorrencia = Leitura::join('alarmes', 'leituras.associacao_id', '=', 'alarmes.associacoes_id')->join('associacoes','alarmes.associacoes_id', '=', 'associacoes.id')->join('setores','associacoes.setor_id','=','setores.id')->join('estufas','setores.estufa_id','=','estufas.id')->where('leituras.id','=',$leitura->id)->select('leituras.id as id', 'alarmes.associacoes_id','alarmes.regra', 'alarmes.valor as alarme_valor', 'leituras.valor as leituras_valor', 'alarmes.id as alarme_id', 'estufas.nome as estufas_nome','deleted_at')->get();
        for($i=0; $i<count($ocorrencia);$i++){
            if($ocorrencia[$i]->deleted_at == null){
                if($ocorrencia[$i]->regra == "<"){
                    if($ocorrencia[$i]->leituras_valor < $ocorrencia[$i]->alarme_valor){
                        Session::put('alerta', [1, $ocorrencia[$i]->estufas_nome]);
                        $ocorrencia[$i]->attachLeituraToAlarme($ocorrencia[$i]->alarme_id);
                    }
                }else{
                    if($ocorrencia[$i]->leituras_valor > $ocorrencia[$i]->alarme_valor){
                        Session::put('alerta', [1, $ocorrencia[$i]->estufas_nome]);
                        $ocorrencia[$i]->attachLeituraToAlarme($ocorrencia[$i]->alarme_id);
                    }
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