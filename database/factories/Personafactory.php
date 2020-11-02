<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\modelos\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    $correo=$faker->unique()->safeEmail;
    $contraseña = $faker->word;
    $nombre = $faker->word;
    $apellidopaterno = $faker->word;
    $apellidomaterno = $faker->word;
    $edad=$faker-> numberBetween(1,50);

    if($edad<18)
{    
    $categoriadeedad="nino";

    }
     else if ($edad>=18 && $edad <=26)
    {

        $categoriadeedad="joven";

    }
    else if ($edad>=27 && $edad <=50)
{
    $categoriadeedad="adulto";

} 
    $sexo=$faker->randomElement(['F','M']);
    return [
        'correo' => $correo,
        'contraseña' => Hash::make($contraseña),
        'nombre'=> $nombre,
        'apellidopaterno'=>$apellidopaterno,
        'apellidomaterno'=>$apellidomaterno,
        'edad'=>$edad,
        'categoriadeedad'=>$categoriadeedad,
        'sexo'=>$sexo,
    ];
});
