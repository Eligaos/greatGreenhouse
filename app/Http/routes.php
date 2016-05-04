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

	Route::post('/admin/home', 'HomeController@inicio');
	Route::get('/admin/home', 'HomeController@home');


	Route::get('/admin/cookie', 'HomeController@showCookie');


	Route::get('/admin/perfil', 'HomeController@showPerfil');
	Route::get('/admin/perfil/editar', 'HomeController@editPerfil');
	Route::post('/admin/perfil/editar', 'HomeController@saveEditPerfil');


	Route::get('/admin/logout', 'HomeController@logout');


	Route::get('/admin/exploracoes/mudar', 'HomeController@mudarExploracao');	
	Route::get('/admin/exploracoes/adicionar', 'ExploracaoController@adicionar');
	Route::get('/admin/exploracoes/detalhes', 'ExploracaoController@detalhesExploracao');
	Route::get('/admin/exploracoes/listar', 'ExploracaoController@listarExploracao');	
	Route::any('/admin/exploracoes/adicionar/submit', 'ExploracaoController@adicionarExploracao');
	Route::get('/admin/exploracoes/editar', 'ExploracaoController@editarExploracao');
	Route::post('/admin/exploracoes/editar/submit', 'ExploracaoController@saveEditExploracao');

	Route::get('/admin/estufas/listar', 'EstufaController@listarEstufas');
	Route::get('/admin/estufas/detalhes/{id}', 'EstufaController@detalhesEstufa');
	Route::get('/admin/estufas/editar/{id}', 'EstufaController@editarEstufa');
	Route::post('/admin/estufas/editar/submit/{id}', 'EstufaController@saveEditEstufa');
	Route::get('/admin/estufas/adicionar', 'EstufaController@adicionar');
	Route::post('/admin/estufas/adicionar/submit', 'EstufaController@adicionarEstufa');

	Route::get('/admin/culturas/listar', 'CulturaController@listarCulturas');
	Route::get('/admin/culturas/getSetorByEstufa/{id}', 'CulturaController@getSetorByEstufa');
	Route::get('/admin/culturas/detalhes/{id}', 'CulturaController@detalhesCultura');
	Route::get('/admin/culturas/editar/{id}', 'CulturaController@editarCultura');
	Route::post('/admin/culturas/editar/submit/{id}', 'CulturaController@saveEditCultura');
	Route::get('/admin/culturas/adicionar', 'CulturaController@adicionar');
	Route::post('/admin/culturas/adicionar/submit', 'CulturaController@adicionarCultura');	

	Route::get('/admin/tipos-leituras/listar', 'TipoLeituraController@listarTiposLeituras');
	Route::get('/admin/tipos-leituras/adicionar', 'TipoLeituraController@tipoLeitura');
	Route::post('/admin/tipos-leituras/adicionar/submit', 'TipoLeituraController@criarNovoTipoLeitura');


	Route::get('/admin/associacoes-tipos-leituras/listar', 'SetorTiposLeiturasAssociadosController@listarAssociacoes');
	Route::get('/admin/associacoes-tipos-leituras/associar', 'SetorTiposLeiturasAssociadosController@associar');

	Route::get('/admin/sensores/listar', 'SensorController@listarSensores');

	Route::get('/admin/leituras/listar', 'LeiturasController@listarLeituras');

});



