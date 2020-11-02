<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Persona extends Authenticatable
{
    use Notifiable;

   use  HasApiTokens,Notifiable;
 

protected $table = 'personas';
protected $fillable = ['correo', 'contraseña', 'apellidopaterno','apellidomaterno',
 'edad', 'categoriadeedad', 'sexo'];

public function comentarios(){
    return $this->hasMany('App\modelos\Comentario');
}

public function Usuario(){
    return $this->belongTo('App\modelos\Usuario');
}
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}
