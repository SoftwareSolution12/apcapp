<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Cozinheiro_a
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
         if(Auth::user()->perfil->nome!=='cozinheiro_a')
        {
            Session::flash('warning','Usuario nao autorizado a aceder essa rota!');

            return redirect()->back();
        }
        return $next($request);
    }
}
