<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
 
protected $table='productos';
protected $fillable = ['producto', 'estado'];

public function comentarios(){
    return $this->belongTo('App\modelos\Comentario');
}
protected $hidden = [
    'contraseña', 'remember_token',
];

/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
protected $casts = [
    'correo' => 'datetime',
];

}
