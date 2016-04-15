<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/	

Route::get('/', function () 
	{
		return view("auth.login");

	});



Route::get('/{action}', 'GuestController@cardinal');


	Route::any('/exploracoes/adicionar/submit', 'ExploracaoController@adicionarExploracao'); //meter no middleware


Route::any('/register/registration', 'GuestController@registerUser');



Route::group(['middleware' => ['web']], function () 
{

	
	Route::get('/home', function () 
	{
		return view("home");

	});
	Route::get('/exploracoes/adicionar', function () 
	{
		return view("adicionarExploracao");

	});


	Route::get('/estufas/listar', function () 
	{
		return view("listagemEstufas");

	});

	Route::get('/exploracoes/listar', function () 
	{
		return view("listagemExploracoes");

	});


	Route::get('/adicionarEstufa', function () 
	{
		return view("adicionarEstufa");

	});



});
