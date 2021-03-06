<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Notícias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container pt-5">

        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif
        
        @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Erro ao realizar esta operação</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

        <form action="/noticias/{{ $noticia->id }}" method="POST" enctype="multipart/form-data"> 
        <!--NÃO PODE SER PUT, OU EH GET OU POST -->
            @csrf <!--CRIPTOGRAFA O ENVIO DE DADOS, E A PESSOA QUE RECEBE, É ATRAVES DE TOKEN-->
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ $noticia->titulo }}">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" rows="5" class="form-control" >{{ $noticia->conteudo }}</textarea>
            <!--textarea é o que contem nele-->
            </div>
            

    
            <div class="form-group">
                <label for="imagem" >Imagem</label>
                <div>
                <input type="file" name="imagem"/>
                </div>

                @if ($noticia->imagem)
                    <img src="{{ $noticia->imagem }}" alt="" height="70px" >
                         <!--imagem tem que exibir diretamente a tag img-->
                @endif
            </div>

            <div class="form-group"> <!--só pra puxar dados-->
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A" {{ $noticia->status == "A" ? "selected='selected'" : "" }}>Ativo</option> <!--if ternario-->
                    <option value="I" {{ $noticia->status == "I" ? "selected='selected'" : "" }}>Inativo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_publicacao">Data da Publicação</label>
                <input type="text" name="data_publicacao" class="form-control"
                 data-provide="datepicker" data-date-language="pt-BR" 
                 value="{{($noticia->data_publicacao)->format('d/m/Y') }}">
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="/noticias" class="btn btn-danger" >Voltar</a>
        <p>
        <h5>Comentários</h5>
        @foreach ($noticia->comentarios as $comentario)
        <div >
        {{ $comentario->conteudo }}
        <p class="text-muted">Comentário realizado em: {{ $comentario->created_at->format('d/m/Y H:i') }}</p>
        </div>
        @endforeach
        </p>
<br>
        <h5>Categorias</h5>
        <p>
        @foreach ($noticia->categorias as $categoria) <!--eh no singular pq dentro do foreach é singular-->
        <div >
        {{ $categoria->titulo }}
        </div>
        @endforeach
        </p>
        </form>

        
    </div>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
