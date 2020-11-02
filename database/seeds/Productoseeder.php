<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\modelos\Producto;

class Productoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Producto::class,48)->create();
        DB::table('Productos')->insert([
            // ..
            'producto'=>'Camara',
            'estado'=>'Dañado'
        ]);
    }
}
