<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comentario::create([
            'conteudo'=> 'uhuu',
            'noticia_id'=>33
        ]);
        Comentario::create([
            'conteudo'=> 'teste',
            'noticia_id'=>35
        ]);
    }
}
