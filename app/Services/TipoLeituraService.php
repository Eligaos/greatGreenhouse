<?php

namespace App\Services;

use App\Models\TipoLeitura;
use Illuminate\Database\Eloquent\Model;

class TipoLeituraService
{
  public function getTiposLeitura()
  { 
    return TipoLeitura::get();
  }

  public function getTiposLeituraPaginate()
  { 
    return TipoLeitura::paginate(8);
  }

  public function adicionarTipoLeitura($input)
  {
    return TipoLeitura::create($input);
  }

  public function procurarTl($id){
   return TipoLeitura::find($id);
 }

 public function guardarEditarTipoLeitura($input, $id){
   $tl = $this->procurarTl($id);
   if($input["parametro"]==$tl->parametro)
   {   
    $tl->unidade = $input["unidade"];
    $tl->save();
    return $tl;
  }else{
    $exists = TipoLeitura::where('parametro', '=', $input["parametro"])->where('id', '!=', $tl->id)->first();
  }if($exists == null){
    $tl->parametro = $input["parametro"];
    $tl->unidade = $input["unidade"];
    $tl->save();    
    return $tl; 
  }else{
    return false;
  }
}   
}




