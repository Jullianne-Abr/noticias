<?php
namespace App\Services;
class UploadService//metodo estatico
{
    public function upload($request)
    {
        $nomeImagem= "imagem.jpg";
        $pathImage= $request->imagem->storeAs ('public',$nomeImagem);
        return '/storage'.$nomeImagem;
    }

}