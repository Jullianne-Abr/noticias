<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
      public function index(){
       
      $noticias= Noticia ::paginate(5);
      return view('noticias.index',[
         "noticias"=>$noticias
      ]);
      //no indice deve colocar como vai querer chamar na view

    }

      public function create(){
        return view('noticias.create');
     }

      public function edit($noticia){
      $noticia=Noticia::findOrFail($noticia);
      return view('noticias.edit', //enviando noticia do controller para a view
      ['noticia'=>$noticia]);
   }

      public function update($noticia, Request $request)
   {  //para acessar a informacao dos bancos de dados, utiliza-se a model Noticia
       $noticia = Noticia::findOrFail($noticia);
       $dados = $request->all();
       $dados['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $dados['data_publicacao'])->format("Y-m-d");
       if ($request->imagem) {
           $request->imagem->storeAs('public', $request->imagem->getClientOriginalName());
           $dados['imagem'] = '/storage/' . $request->imagem->getClientOriginalName();
       }
       $noticia->update($dados);
       
       return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
   }

      public function delete($noticia)
   {
       $noticia = Noticia::findOrFail($noticia);
       $noticia->delete();

       return redirect('/noticias')->with('mensagem', 'Registro excluído com sucesso!');
   }

      public function store(Request $request)
     {
      /*visualizar dados do formulario, sexibindo o valor de uma variavel*/

      $dados=$request->all();
   
      $dados['data_publicacao'] = Carbon::createFromFormat('d/m/Y', $dados['data_publicacao'])->format('Y-m-d');
      /*acessar data*/

      

      $request->imagem->storeAs ('public',$request->imagem->getClientOriginalName());
      $dados['imagem']='/storage/' . $request->imagem->getClientOriginalName();
      Noticia::create($dados);

      return redirect()->back()->with(['mensagem'=>'Registro salvo com sucesso!']);
   }
   public function destroy($noticia){
      $noticia= Noticia::find($noticia);
      $noticia->delete();

      return redirect()->back()
      ->with(['mensagem'=>'Registro excluido']);
}

/*metodo apphtttp */
// tr pra cada linha da tabela 
//td para cada coluna
//cfrs é um token, cria um codigo 
//=> array, sempre que tem [] usa-se ele
}