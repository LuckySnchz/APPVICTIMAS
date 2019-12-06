<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Caso;

use Closure;

class middlewareDetalle
{
    public function handle($request, Closure $next)
    {

 if (auth()->user()->hasRole('admin')) { 
    return $next($request);
    }elseif (auth()->user()->hasRole('profesional')) {
            return $next($request);
    }else{
        abort(403, "No tienes autorización para ingresar.");
    }
    if (auth()->user()->hasRole('user')) {
        return $next($request); 
    }else{
        abort(403, "No tienes autorización para ingresar.");
    } 
                
}
}  



