<?php

use Illuminate\Database\Seeder;
use App\modelos\Comentario;
use Illuminate\Support\Facades\DB;

class Comentarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comentario::class,48)->create();
        DB::table('comentarios')->insert([
            // ..
            'titulo'=> 'Calidad',
            'comentario'=>'es de alta calidad',
            'persona'=>49,
            'producto'=>49,
           
        ]);
    }
}
