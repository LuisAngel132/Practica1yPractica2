<?php

namespace App\Http\Middleware;

use Closure;

class Personasconcategoriamiddleware
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
       
        if($request->categoriaenelforo=="Gratis")
        {
            return $next($request);
        }
        else if($request->categoriaenelforo=="Basico")
        {
            return $next($request);

        }else if($request->categoriaenelforo=="Premium")
        {
            return $next($request);

        }else if($request->categoriaenelforo=="Vip")
        {
            return $next($request);

        }else if($request->categoriaenelforo=="Clandestino")
        {
            return $next($request);

        }else{

            return response()->json([ "Error de dato la categoria no existe"],400);

        }
    }
}
