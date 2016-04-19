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


Route::post('/auth', 'GuestController@auth');




Route::any('/register/registration', 'GuestController@registerUser');



Route::group(['middleware' => ['web']], function () 
{

	
	Route::post('/admin/home', 'HomeController@home');

	Route::get('/admin/exploracoes/adicionar', function () 
	{
		return view("adicionarExploracao");

	});

	Route::get('/admin/exploracoes/detalhes', 'ExploracaoController@listarExploracao');

	Route::get('/admin/selecionarExploracao', 'ExploracaoController@listarExploracao');
	
	Route::any('/admin/adicionar/submit', 'ExploracaoController@adicionarExploracao');
	


	Route::get('/admin/estufas/listar', function () 
	{
		return view("listagemEstufas");

	});




	Route::get('/admin/adicionarEstufa', function () 
	{
		return view("adicionarEstufa");

	});



});


Route::get('/{action}', 'GuestController@cardinal');
