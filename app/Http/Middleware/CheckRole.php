<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next,$role)
    {
        //Comprueba si el rol del usuario es igual al nombre del rol que le pasamos 
        if ($request->user() && $request->user()->hasRole($role)) {
            //deja pasar el flujo con la respuesta.
            return $next($request);
        }
        //redirije a home
        return redirect('/');
    }
}
