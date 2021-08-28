<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Carbon\Carbon;
use App\Http\Requests\NoticiaRequest;

class NoticiaController extends Controller
{
      public function index(){
       //array $ / /Noticia modulo
      $noticias= Noticia ::where('status',Noticia::STATUS_ATIVO)->paginate(5);
      //noticias e o que queres renderizar
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

      public function store(NoticiaRequest $request)
     {
       //Request é uma classe, em letra maiuscula 
      /*visualizar dados do formulario, sexibindo o valor de uma variavel*/

      $dados=$request->all();
      $dados['imagem']=UploadService::upload($request);
      $noticia= Noticia::create($dados);

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