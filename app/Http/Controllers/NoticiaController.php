<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(){
       return view('noticias.index');
    }

    public function create(){
        return view('noticias.create');
     }

}

