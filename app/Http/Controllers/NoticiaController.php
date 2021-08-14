<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(){
       
      $noticias= Noticia ::all();
      return view('noticias.index',[
         "noticias"=>$noticias
      ]);
      //no indice deve colocar como vai querer chamar na view

    }

    public function create(){
        return view('noticias.create');
     }

     public function update(){
      return view('noticias.update');
   }

      public function delete(){
      return view('noticias.delete');
   }

     public function store(Request $request)
     {
      /*visualizar dados do formulario, exibindo o valor de uma variavel*/

      $dados=$request->all();
      $dataFormatada = Carbon::createFromFormat('d/m/Y', /*acessar data*/ $request->data_publicacao)->format('Y-m-d');
      
      $nomeImagem = "nome-imagem.jpg";
      $pathImagem= $request->imagem->storeAs('public',$nomeImagem);
      $dados['data_publicacao']=$dataFormatada;
      $dados['imagem']='/storage/'. $nomeImagem;
      //Noticia::create($resquest->all());
      $noticia= Noticia::create($dados);

      return redirect()->back()->with(['mensagem'=>'Registro salvo com sucesso!']);
   }

}

/*metodo apphtttp */
