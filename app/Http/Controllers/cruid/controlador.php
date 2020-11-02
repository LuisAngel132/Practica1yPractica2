<?php

namespace App\Http\Controllers\cruid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Persona;
use App\modelos\personal_access_tokens;
use App\modelos\producto;
use App\modelos\comentario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class controlador extends Controller
{

    public function Insertar(Request $request){
 $request->validate([
'correo'=>'required|email',
'contraseña'=>'required',
'nombre'=>'required',
'apellidopaterno'=>'required',
'apellidomaterno'=>'required',
'edad'=>'numeric|required',
'categoriaenelforo'=>'required',
'sexo'=>'required|max:1',


 ]);

     $persona= new Persona();
 $persona->correo=$request->correo;
 $persona->contraseña=Hash::make($request->contraseña);
$persona->nombre=$request->nombre;
$persona->apellidopaterno=$request->apellidopaterno;
$persona->apellidomaterno=$request->apellidomaterno;
$persona->edad=$request->edad;

if($request->edad<18)
{    
    $categoria="nino";

    }
     else if ($request->edad>=18 && $request->edad <=26)
    {

        $categoria="joven";

    }
    else if ($request->edad>=27 && $request->edad <=50)
{
    $categoria="adulto";

} 
$persona->categoriadeedad=$categoria;
$persona->sexo=$request->sexo;

$persona->save();
return response()->json([$persona,],201);

    }

    public function Vista(Request $request)
    
    {
        if ($request->user()->tokenCan('Basica')||$request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
        {
            $persona= Persona::all();
            return response()->json([ $persona],201);

        }
        else if ($request->user()->tokenCan('Gratis')) {
return response()->json([$request->user()],201);
        }

    }
    public function Borrarpersona(Request $request,$id)
    {
        if ($request->user()->tokenCan('Gratis')||$request->user()->tokenCan('Basica')||$request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip') )
        {
        $persona= Persona::find($id);
        $persona->delete();
        $persona= Persona::all();
        return response()->json([$persona,],201);
        }
    }
    public function Actualizarpersona(Request $request,$id){
        $request->validate([
           
            'nombre'=>'required',
            'apellidopaterno'=>'required',
            'apellidomaterno'=>'required',
            'edad'=>'numeric|required',
            'categoriaenelforo'=>'required',
            'sexo'=>'required',
            
            
             ]);
             if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip') )
             { 
        $persona=Persona::find($id);
        $persona->nombre=$request->nombre;
        $persona->apellidopaterno=$request->apellidopaterno;
       $persona->apellidomaterno=$request->apellidomaterno;
        $persona->edad=$request->edad;if($request->edad<18)
        {    
            $categoria="nino";
        
            }
             else if ($request->edad>=18 && $request->edad <=26)
            {
        
                $categoria="joven";
        
            }
            else if ($request->edad>=27 && $request->edad <=50)
        {
            $categoria="adulto";
        
        } 
        $persona->categoriadeedad=$categoria;
         $persona->sexo=$request->sexo;

         $persona->save();
        return response()->json([$persona,],201);
             }
    }

public function Insertarproducto(Request $request){
    $request->validate([
        'producto'=>'required',
        'estado'=>'required', 
         ]);

if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
         {
$producto=new Producto;
$producto->producto =$request->producto;
$producto->estado =$request->estado;
$producto->save();
return response()->json([$producto],201);
         }
}
public function Verproducto(Request $request){
    
    if ($request->user()->tokenCan('Basica')||$request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
        {
            $producto=producto::all();
            return response()->json([ $producto],201);

        }
      
        
}
public function Eliminarproducto(Request $request,$id){
    if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
         {
$producto=Producto::find($id);
$producto->delete();
$producto=Producto::all();
return response()->json([$producto,],201);
         }
}
public function Actualizarproducto(Request $request,$id){
    $request->validate([
        'producto'=>'required',
        'estado'=>'required', 
         ]);
         if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
         {      
    $producto=Producto::find($id);
    $producto->producto=$request->producto;
    $producto->estado=$request->estado;
    $producto->save();
    return response()->json([$producto,],201);
         }

}public function Insertarcomentario(Request $request){
    $request->validate([
           
        'titulo'=>'required',
        'comentario'=>'required',
        'persona'=>'numeric|required',
        'producto'=>'numeric|required',
              ]);
              if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
              {          
$comentario=new comentario;
$comentario->titulo =$request->titulo;
$comentario->comentario =$request->comentario;
$comentario->persona =$request->persona;
$comentario->producto =$request->producto;
              
$comentario->save();
return response()->json([$comentario,],201);
              }
}
public function Vercomentarios(Request $request){
    if ($request->user()->tokenCan('Gratis')||$request->user()->tokenCan('Basica')|| $request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip') )
    {
        $comentario=comentario :: all();
        return response()->json([$comentario,],201);

    }
   
}
public function Vercomentariosporpersona(Request $request,$id=null){
    if ($request->user()->tokenCan('Vip'))
    {
    $comentario=comentario :: where('persona',$id)->get();

            return response()->json([$comentario,],201);
    }
        }
public function Vercomentariosporproducto(Request $request,$id=null){
if ($request->user()->tokenCan('Vip'))
{
    $comentario=comentario::where('producto',$id)->get();
return response()->json([$comentario,],201);
}
}
public function Eliminarcomentario(Request $request,$id){
if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
{       
$comentario=comentario::find($id);
$comentario->delete();
$comentario=comentario::all();
return response()->json([$comentario,],201);
}
}
public function Actualizarcomentario(Request $request,$id)
{
    $request->validate([
        'titulo'=>'required',
        'comentario'=>'required',
        'persona'=>'numeric|required',
        'producto'=>'numeric|required',
              ]);
              if ($request->user()->tokenCan('Premiun')||$request->user()->tokenCan('Vip'))
              {             
    $comentario=comentario::find($id);
    $comentario->titulo =$request->titulo;
    $comentario->comentario =$request->comentario;
    $comentario->persona =$request->persona;
    $comentario->producto =$request->producto;

    $comentario->save();
    return response()->json([$comentario,],201);
              }
    

}
public function LogIn(Request $request)
{
    $request->validate([
        'correo'=>'required|email',
        'contraseña'=>'required',
    ]);
    $user=Persona:: where('correo',$request->correo)->first();
    if(!$user||!Hash::check($request->contraseña,$user->contraseña))
    {
throw ValidationException::withMessages([
    'correo|contraseña'=>['sus datos son incorrectos'],]);

    }
else{
    $token = $user->createToken($request->correo, ['Gratis'])->plainTextToken;
    $user->save();


return response()->json([ $token],201);

}
    
}
public function verpermisos(Request $request){
if ($request->user()->tokenCan('admin'))
{      
$permiso=personal_access_tokens::all();
return response()->json([$permiso],201);
}
}
public function cambiarpermisos(Request $request,$id){
    if ($request->user()->tokenCan('admin'))
    {         
$permiso=personal_access_tokens::find($id);
$permiso->abilities=$request->abilities;
$permiso->save();
$permiso=personal_access_tokens::find($id);
return response()->json([$permiso],201);
    }
}
public function LogInadministrador(Request $request)
{ $request->validate([
    'correo'=>'required|email',
    'contraseña'=>'required',
]);
$user=Persona:: where('correo',$request->correo)->first();
if(!$user||!Hash::check($request->contraseña,$user->contraseña))
{
throw ValidationException::withMessages([
'correo|contraseña'=>['sus datos son incorrectos'],]);

}
else{
$token = $user->createToken($request->correo, ['admin'])->plainTextToken;
$user->save();


return response()->json([ $token],201);

}
}
public function LogOut (Request $request){
return response()->json(["eliminados"=>$request->user()->tokens()->delete()],201);
}
}