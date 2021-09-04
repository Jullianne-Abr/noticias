<x-template titulo="Titulo da Pagina">
<div class="container pt-5">
    <h3>Listagem de notícias</h3>
    <a href="/noticias/create" class="btn btn-primary" >Nova noticia </a>
    @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
    @endif     

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Ações</th>
      <th scope="col">Título</th>
      <th scope="col">Imagem</th>
      <th scope="col">Data da publicação</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($noticias as $noticia)
      <tr>
      <td> 
      <a href="/noticias/{{$noticia->id}}/edit" class="btn btn-dark" >Editar</a>

      <form action="/noticias/{{$noticia->id}}" method="POST" onSubmit="confirmarExclusao(event)">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger" >Excluir</button>

      </form>
      </td>
      <td>{{$noticia->titulo}}</td>
      <td>
        <img src="{{$noticia->imagem}}" height="40px">
      </td>
      <td>{{$noticia->data_publicacao->format('d/m/Y')}}</td>

      <td>
      {{$noticia->status_formatado}}
      </td>
      </tr>
      @endforeach

  </tbody>
</table>

{{$noticias->links() }} <!--mostrar os dados-->

</div>
</x-template>