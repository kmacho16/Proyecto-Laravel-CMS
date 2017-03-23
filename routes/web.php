<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;
use Carbon\Carbon;




Route::get('/','FrontController@home');
Route::get('/contacto','FrontController@contact');
Route::post('/contacto/send','FrontController@send');

Route::get('/tags/{tag}','FrontController@tags');
Route::post('/comments','CommentsController@store');

Route::get('/comentarios/{post}','CommentsController@index');
Route::delete('/eliminarCom/{id}','CommentsController@destroy');

Route::get('admin/home',function(){
	return view('admin.home');
});

Route::resource('/admin','AdminController');
Route::resource('/categorias','CategoriasController');
Route::resource('/post','PostController');



Route::get('subir','FilesController@list');
Route::get('subir/up','FilesController@up');
Route::get('subir/destroy/{id}','FilesController@destroy');
Route::post('subir/storage','FilesController@storage');



Auth::routes();

Route::get('/home', 'HomeController@index');
