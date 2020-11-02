<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table='comentarios';
    protected $fillable = ['titulo', 'comentario', 'persona','producto',];
    public function productos(){
        return $this->belongTo('App\modelos\Producto');
            }
            public function personas(){
                return $this->belongTo('App\modelos\Persona');
                    }

}
