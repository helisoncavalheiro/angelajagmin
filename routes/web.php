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
Route::view('/admin/addPubli', 'admin.form_publi');
/*
Rota para a area administrativa
*/
Route::get('/admin', 'AdminController@index');

Route::prefix('/admin')->group(function(){
	Route::resources([
		'autor'=>'AutorController',
		'categoria'=>'CategoriaController',
		'projeto'=>'ProjetoController',
		'publicacao'=>'PublicacaoController'
	]);
});



