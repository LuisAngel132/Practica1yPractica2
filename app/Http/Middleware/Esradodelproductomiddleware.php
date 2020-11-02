<?php

namespace App\Http\Middleware;

use Closure;

class Esradodelproductomiddleware
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
        if($request->estado=="Dañado"){
            return $next($request);

        }else if($request->estado=="Calidad buena")
        {
            return $next($request);

        }
        else{
            return response()->json([ "no existe el estado"],400);


        }
    }
}
