<?php

use Illuminate\Database\Seeder;
use App\modelos\Persona;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        $this->call(Personaseeder::class);
        $this->call(Productoseeder::class);
        $this->call(Comentarioseeder::class);

    }
}
