<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
       // if (!auth()->check()){ // para verificar si el usuario ha iniciado secion
       //     return redirect('/login');
       // }

        if (!auth()->user()->admin){ //para saber si el usuario es administrador 
            return redirect('/login');
        }

        return $next($request);
    }
}
