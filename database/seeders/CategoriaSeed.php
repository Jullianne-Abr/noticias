<?php

namespace Database\Seeders;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
       
            "titulo" => "Politica"
        ]);
        Categoria::create([
       
            "titulo" => "Esporte"
        ]);
        Categoria::create([
       
            "titulo" => "Economia"
        ]);
        Categoria::create([
       
            "titulo" => "Eleições"
        ]);
    }

}
