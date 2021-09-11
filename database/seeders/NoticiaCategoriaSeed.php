<?php

namespace Database\Seeders;
use App\Models\NoticiaCategoria;
use Illuminate\Database\Seeder;

class NoticiaCategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoticiaCategoria::create([
            'noticia_id'=>33,
            'categoria_id'=>2
        ]);

    }
}
