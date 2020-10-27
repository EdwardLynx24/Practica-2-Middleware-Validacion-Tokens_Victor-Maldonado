<?php

namespace App\Http\Middleware;

use Closure;

class verificarAdmin
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
        if($request->rol_id != 2){
            return abort(401,'No eres admin  papu :V');
        }
        return $next($request);
    }
}
