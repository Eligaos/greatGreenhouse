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


Route::group(['middleware' => ['web']], function () 
{
	Route::get('/', 'GuestController@login');

	Route::get('/recovery', 'GuestController@recovery');

	Route::get('/login', 'GuestController@login');

	Route::get('/register', 'GuestController@register');

	Route::post('/authentication', 'GuestController@login');

	Route::any('/register/registration', 'GuestController@registerUser');

	Route::post('/authentication/auth', 'GuestController@auth');

	Route::get('/admin/home', 'HomeController@home');

	Route::get('/admin/cookie', 'HomeController@showCookie');

	Route::get('/admin/perfil', 'HomeController@showPerfil');

	Route::get('/admin/perfil/editar', 'HomeController@editPerfil');

	Route::post('/admin/perfil/editar', 'HomeController@saveEditPerfil');

	Route::post('/admin/home', 'HomeController@home');

	Route::get('/admin/logout', 'HomeController@logout');

	//Route::get('/admin/perfil', 'HomeController@showPerfil');

	Route::get('/admin/adicionarExploracao', function () 
	{
		return view("adicionarExploracao");
	});

	Route::get('/admin/exploracoes/detalhes', 'ExploracaoController@listarExploracao');

	Route::get('/admin/selecionarExploracao', 'ExploracaoController@listarExploracao');
	
	Route::any('/admin/adicionarExploracao/submit', 'ExploracaoController@adicionarExploracao');
	


	Route::get('/admin/estufas/listar', 'EstufaController@listarEstufas');

	Route::get('/admin/adicionarEstufa', function () 
	{
		return view("adicionarEstufa");

	});
	Route::post('/admin/adicionarEstufa/submit', 'EstufaController@adicionarEstufa');
	
});


