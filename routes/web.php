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
        'post' => 'Home\\PostController',
        'project' => 'Home\\ProjectController'
    ]);

    Route::get('/project/{id}/posts', 'Home\ProjectController@showPostsFromProject');
    Route::get('/file/{id}', 'Home\FileController@download');
    Route::get('/tag/{id}/posts', 'Home\\TagController@showPostsByTag');
    Route::get('/tag', 'Home\\TagController@showTags');
});

Route::prefix('/admin')->group(function(){
	Route::resources([
		'author'=>'Admin\\AuthorController',
		'tag'=>'Admin\\TagController',
		'project'=>'Admin\\ProjectController',
		'post'=>'Admin\\PostController'
	]);
    Route::get('/image/delete/{id}', 'Admin\ImageController@delete');
    Route::get('/file/delete/{id}', 'Admin\FileController@delete');
    Route::get('/file/download/{id}', 'Admin\FileController@download');
    Route::get('/video/delete/{id}', 'Admin\\VideoController@delete');
    Route::get('/tag/delete/{id}', 'Admin\\TagController@deleteTag');
});

Route::get('/admin/image/delete/{id}', 'Admin\ImageController@delete');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
