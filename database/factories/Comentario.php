<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\modelos\Comentario;

$factory->define(Comentario::class, function (Faker $faker) {
    $titulo = $faker->word;
    $comentario = $faker->word;
    $persona =$faker->numberBetween(1,48);
    $producto = $faker->numberBetween(1,48);
    

    return [
        'titulo'=> $titulo,
        'comentario'=>$comentario,
        'persona'=>$persona,
        'producto'=>$producto,
      
    ];
    
});
