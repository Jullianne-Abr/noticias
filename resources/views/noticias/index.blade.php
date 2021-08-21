<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabinete - Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
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

      <form action="/noticias/{{$noticia->id}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Excluir</button>

      </form>
      </td>
      <td>{{$noticia->titulo}}</td>
      <td>
        <img src="{{$noticia->imagem}}" height="40px">
      </td>
      <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $noticia->data_publicacao)->format("d/m/Y")}}</td>

      <td>
          @if ($noticia->status =="A")
          Ativo
          @else
          Inativo
          @endif

      </td>
      </tr>
      @endforeach

  </tbody>
</table>

{{$noticias->links() }}

</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>        
</body>
</html>
