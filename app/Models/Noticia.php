<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    const STATUS_ATIVO="A"; //o ideal deve ser no inicio da classe
    use HasFactory;
    protected $table = 'noticias';
    protected $guarded =['id','create_at','update_at']; //campo para definir o que o usuario nao podera alterar
    protected $dates=['data_publicacao','created_at','update_at'];
    public function getStatusFormatadoAttribute(){ 
        /*tem que colocar atribute pq caso contrario vai pensar que é metodo*/
        
        if ($this->status =="A"){
            return "Ativo";
        }
                return "Inativo";
        } //é this pq está dentro de uma classe, e nao sabe qual vai ser o nome da classe
        public function setDataPublicacaoAttribute($valor)
        {
            $this ->attributes['data_publicacao'] = \Carbon\Carbon::createFromFormat
            ('d/m/Y', $valor)->format('Y-m-d');
        }
        
        public function comentarios()
        {
            return $this-> hasMany(Comentario::class); //$model e a variavel
        }
        public function categorias()
        {
            return $this-> belongsToMany(Categoria::class, 'noticias_categorias'); //$model e a variavel
        }
}
    
