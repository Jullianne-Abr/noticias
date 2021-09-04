<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController; /* DESSA FORMA EVITA USAR TODA A ROTA DENTRO 
DA ROUTE PASSANDO SOMENTE O NOME DO ARQUIVO */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* rotas padrao */
/*
Route::get('/', function () {
    return view('welcome');
});*/


/* VAI ENCAMINHAR PARA O CONTROLER E DEPOIS A RETORNA A VIEW*/
//Route::get('/noticias', [NoticiaController::class, 'index']);

/* ROTA PARA MOSTRAR O FORMULARIO */
//Route::get('/noticias/create', [NoticiaController::class, 'create']);


/* ROTA PARA MOSTRAR O FORMULARIO */
//Route::get('/noticias/create', [NoticiaController::class, 'create']);

/* ROTA PARA MOSTRAR O FORMULARIO */
//Route::put('/noticias/{noticia}', [NoticiaController::class, 'update']);

/* ROTA PARA MOSTRAR O FORMULARIO */
//Route::get('/noticias/delete', [NoticiaController::class, 'delete']);

/*ROTA PARA, salvar para um novo bd*/ 
//Route :: post ('/noticias', [NoticiaController:: class,'store' ]);

/* ROTA PARA O BOTAO EDITAR */ //dar nome ao parametro {noticia}
//Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit']); //criando a rota para editar a noticia
//Route::delete('noticias/{noticia}', [NoticiaController::class, 'delete']);
//get puxar dados
//put atualizar dados
//post mandar dados, salvar

/*para redução de quantidade de rotas*/ 

Route::resource('noticias', NoticiaController::class);


