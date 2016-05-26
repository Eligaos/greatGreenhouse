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


	/**********GUEST**********/
	Route::get('/', 'GuestController@login');
	Route::get('/recovery', 'GuestController@recovery');
	Route::get('/login', 'GuestController@login');
	Route::get('/register', 'GuestController@register');
	Route::post('/authentication', 'GuestController@login');
	Route::post('/authentication/auth', 'GuestController@auth');
	Route::post('/register/registration', 'GuestController@registerUser');

	/********SELECCIONAR EXPLORACAO**********/
	Route::get('/admin/exploracoes/adicionar', 'ExploracaoController@adicionar');
	Route::get('/admin/exploracoes/listar', 'ExploracaoController@listarExploracao');	
	Route::post('/admin/exploracoes/adicionar/submit', 'ExploracaoController@adicionarExploracao');

	Route::get('/admin/exploracoes/mudar', 'HomeController@mudarExploracao');	
		Route::post('/admin/home', 'HomeController@inicio');
	Route::group(['middleware' => ['select.exploration']], function () 
{


	/**********HOME**********/

	Route::get('/admin/home', 'HomeController@home');
	Route::get('/admin/logout', 'HomeController@logout');

	Route::get('/admin/cookie', 'HomeController@showCookie');

	/**********PERFIL**********/

	Route::get('/admin/perfil', 'HomeController@showPerfil');
	Route::get('/admin/perfil/editar', 'HomeController@editPerfil');
	Route::post('/admin/perfil/editar', 'HomeController@saveEditPerfil');


	/**********EXPLORACOES**********/



	Route::get('/admin/exploracoes/detalhes', 'ExploracaoController@detalhesExploracao');



	Route::get('/admin/exploracoes/editar', 'ExploracaoController@editarExploracao');
	Route::post('/admin/exploracoes/editar/submit', 'ExploracaoController@saveEditExploracao');

	/**********ESTUFAS**********/

	Route::get('/admin/estufas/listar', 'EstufaController@listarEstufas');
	Route::get('/admin/estufas/detalhes/{id}', 'EstufaController@detalhesEstufa');
	Route::get('/admin/estufas/editar/{id}', 'EstufaController@editarEstufa');
	Route::post('/admin/estufas/editar/submit/{id}', 'EstufaController@saveEditEstufa');
	Route::get('/admin/estufas/adicionar', 'EstufaController@adicionar');
	Route::post('/admin/estufas/adicionar/submit', 'EstufaController@adicionarEstufa');
	Route::get('/admin/estufas/setores', 'EstufaController@getSetores');

	/**********ESPÉCIES**********/

	Route::get('/admin/especies/listar', 'EspecieController@listarEspecies');
	Route::get('/admin/especies/adicionar', 'EspecieController@adicionar');
	Route::get('/admin/especies/detalhes/{id}', 'EspecieController@detalhesEspecie');
	Route::post('/admin/especies/adicionar/submit', 'EspecieController@adicionarEspecie');
	Route::get('/admin/especies/editar/{id}', 'EspecieController@editarEspecie');
	Route::post('/admin/especies/editar/submit/{id}', 'EspecieController@saveEditEspecie');

	/**********CULTURAS**********/

	Route::get('/admin/culturas/listar', 'CulturaController@listarCulturas');
	Route::get('/admin/culturas/getSetorByEstufa/{id}', 'CulturaController@getSetorByEstufa');
	Route::get('/admin/culturas/detalhes/{id}', 'CulturaController@detalhesCultura');
	Route::get('/admin/culturas/editar/{id}', 'CulturaController@editarCultura');
	Route::post('/admin/culturas/editar/submit/{id}', 'CulturaController@saveEditCultura');
	Route::get('/admin/culturas/adicionar', 'CulturaController@adicionar');
	Route::post('/admin/culturas/adicionar/submit', 'CulturaController@adicionarCultura');	

	/**********TIPOS-LEITURAS**********/

	Route::get('/admin/tipos-leituras/listar', 'TipoLeituraController@listarTiposLeituras');
	Route::get('/admin/tipos-leituras/adicionar', 'TipoLeituraController@tipoLeitura');
	Route::post('/admin/tipos-leituras/adicionar/submit', 'TipoLeituraController@criarNovoTipoLeitura');

	/**********ASSOCIACOES-TIPOS-LEITURAS**********/

	Route::get('/admin/associacoes/listar', 'AssociacoesController@listarAssociacoes');
	Route::get('/admin/associacoes/associar', 'AssociacoesController@associar');
	Route::post('admin/associacoes/associar/submit', 'AssociacoesController@associarSubmit');


	/**********SENSORES**********/

	Route::get('/admin/sensores/listar', 'SensorController@listarSensores');
	Route::get('/admin/sensores/adicionar', 'SensorController@adicionarSensor');
	Route::get('/admin/sensores/detalhes/{id}', 'SensorController@detalhesSensor');
	Route::get('/admin/sensores/editar/{id}', 'SensorController@editarSensor');
	Route::post('/admin/sensores/adicionar/submit', 'SensorController@adicionarSensorSubmit');


	/**********LEITURAS**********/

	Route::get('/admin/leituras/listar', 'LeituraController@listarLeituras');
	Route::get('/admin/leituras/getAssociacoes/{id}', 'LeituraController@getAssociacoes');
	
	Route::get('/admin/leituras/adicionarRegistoManual', 'LeituraController@adicionarRegistoManual');
	Route::post('/admin/leituras/adicionarRegistoManual/submit', 'LeituraController@adicionarRegistoManualSubmit');



	Route::get('/admin/leituras/getLastHoursLeituras', 'LeituraController@getLastHoursLeituras');


	/**********GRAFICOS**********/
	Route::get('/admin/graficos/listar', 'LeituraController@listarLeituras');



	/**********ALARMES**********/
	Route::get('/admin/alarmes/listar', 'LeituraController@listarLeituras');

	/**********COLABORADORES**********/
	Route::get('/admin/colaboradores/listar', 'LeituraController@listarLeituras');
});


});



