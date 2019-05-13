<?php

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

/*Renderiza a página inicial
Adicionar um controller que recupera as últimas
publicações do banco de dados
*/
Route::view('/', 'inicial.home');

/*
Rota para a area administrativa
*/
Route::view('/administrativo', 'admin.inicial');

/*
renderiza a view publicação
Adicionar um parâmetro com o id da publicacção
e um controller que recupera essa publicação
*/
Route::get('/publicacao', function(){
	return view('inicial.publicacao');
});