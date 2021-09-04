<?php
namespace App\Services;
class UploadService//metodo estatico
{
    public static function upload($request)
    {
        $nomeImagem= date('YmdHis') . mt_rand(0,9999).".jpg"; //para fazer o nome randomico 
        $pathImage= $request->imagem->storeAs ('public',$nomeImagem);
        return '/storage/'.$nomeImagem;
    }

}