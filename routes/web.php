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
Route::get('/', 'Home\\PostController@index')->name('home.posts');
/*
Rota para a area administrativa
*/
Route::get('/admin', 'Admin\PostController@index');

Route::prefix('/')->group(function(){
    Route::resources([
        'post' => 'Home\\PostController'
    ]);
});

Route::prefix('/admin')->group(function(){
	Route::resources([
		'author'=>'Admin\\AuthorController',
		'category'=>'Admin\\CategoryController',
		'project'=>'Admin\\ProjectController',
		'post'=>'Admin\\PostController'
	]);
});



