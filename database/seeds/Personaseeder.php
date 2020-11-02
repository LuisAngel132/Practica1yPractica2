<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\modelos\Persona;

class Personaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Persona::class,48)->create();
        DB::table('Personas')->insert([
            // ..
            'correo'=>'raul@gmail.com',
            'contraseña'=>Hash::make('Dañado'),
            'nombre'=>'raul',
            'apellidopaterno'=>'Rodriguez',
            'apellidomaterno'=>'Rodriguez',
            'edad'=>22,
            'categoriadeedad'=>'joven',
            'sexo'=>'M',

        ]);
    }
}
