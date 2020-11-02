<?php

namespace App\Http\Middleware;

use Closure;

class Edadmiddleware
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
        if ($request->edad>=51)
        {
         return abort(400,"excede el maximo de edad");   
        }
        return $next($request);
            }
}
