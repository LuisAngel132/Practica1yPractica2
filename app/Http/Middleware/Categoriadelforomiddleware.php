<?php

namespace App\Http\Middleware;
use App\modelos\Persona;

use Closure;

class Categoriadelforomiddleware
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
        $id=$request->persona;
        $comentario=persona ::find($id);        
    $datodecategoria=$comentario->categoriaenelforo;
        if($datodecategoria=="Gratis")
        {
            return response()->json([ "lo sentimos su cuenta no tiene acceso a comentar"],400);
        }
        else if($datodecategoria=="Basico")
        {
            return $next($request);

        }else if($datodecategoria=="Premium")
        {
            return $next($request);

        }else if($datodecategoria=="Vip")
        {
            return $next($request);

        }else if($datodecategoria=="Clandestino")
        {
            return $next($request);

        }

    }
}
