<?php

namespace App\modelos;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Persona extends Model
{
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
}
