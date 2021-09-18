<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;//eh no singular pq o laravel coloca no plural a tabela
    public function noticias()
    {
        return $this->belongsToMany(Noticia::class, 'noticias_categorias');
    }
}
// event.preventDefault
//Model::