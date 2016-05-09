<?php

namespace App\Http\Middleware;

use Closure;

class SelectExploration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ($request->session()->get('exploracaoSelecionada') == null)
        {
            return redirect('admin/exploracoes/listar');

           
        }
        return $next($request);
    }
}
