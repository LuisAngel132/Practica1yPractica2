<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\modelos\Producto;

$factory->define(Producto::class, function (Faker $faker) {
        $producto = $faker->word;
        $estado = $faker->randomElement(['Dañado','Calidad buena']);;
      
        return [
            'producto'=> $producto,
            'estado'=>$estado,

        ];
    
});
