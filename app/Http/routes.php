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

	Route::get('/login', function () 
	{
		return view("auth.login");

	});

	//Route::any('/register', 'RegisterController@showRegisterView');
	Route::get('/register', function(){

		return view("auth.register");
	});



Route::group(['middleware' => ['web']], function () 
{



	Route::get('/exploracoes/adicionar', function () 
	{
		return view("adicionarExploracao");

	});

	Route::any('/exploracoes/adicionar/submit','ExploracaoController@adicionarExploracao'); 

	Route::get('/estufas/listar', function () 
	{
		return view("listagemEstufas");

	});



	Route::get('/adicionarEstufa', function () 
	{
		return view("adicionarEstufa");

	});


	Route::get('/home', function () 
	{
		return view("home");

	});

});
