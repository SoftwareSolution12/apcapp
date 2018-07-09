<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Garcom
{

    public function handle($request, Closure $next)
    {
         if(Auth::user()->perfil->nome!=='garcom')
        {
            Session::flash('warning','Usuario nao autorizado a aceder essa rota!');

            return redirect()->back();
        }
        return $next($request);
    }
}
