<?php

namespace App\Http\Middleware;

use Closure;

class ValidarEdad
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
        if ($request->edad <= 18) {
            return abort(200,'No te podemos registrar compa :V');
        }
        return $next($request);
    }
}
