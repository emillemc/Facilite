<?php

/********************** AppController ********************/
Route::group(['namespace' => 'App'], function(){

	// Home
	Route::get('/', [
		'uses' 	=> 'AppController@index',
		'as'	=> 'home' // <- Rota nomeada
	]);

	// Listar Categorias
	Route::get('/categorias', [
		'uses' 	=> 'AppController@listarCategorias',
		'as'	=> 'categorias' // <- Rota nomeada
	]);

	// Listar Serviços passando a url Categoria
	Route::get('/categorias/{urlCat?}', [
		'uses' 	=> 'AppController@listarServicos'
	]);
	
	// Listar Profissionais passando a url Categoria e Serviço
	Route::get('/categorias/{urlCat?}/{urlServ?}', [
		'uses' 	=> 'AppController@listarProfissionais'
	]);

});

/***************************//****************************/

/******************** AuthController *********************/
Route::group(['namespace' => 'Auth'], function(){

	// Login
	Route::get('/login', [
		'uses' 	=> 'LoginController@login',
		'as'	=> 'login' // <- Rota nomeada
	]);

	// PostLogin
	Route::post('/login', [
		'uses' 	=> 'LoginController@postLogin',
		'as'	=> 'postLogin' // <- Rota nomeada
	]);

	// Logout
	Route::post('/logout', [
		'uses' 	=> 'LoginController@logout',
		'as'	=> 'logout' // <- Rota nomeada
	]);

	// Cadastrar
	Route::get('/cadastrar', [
		'uses' 	=> 'RegisterController@index',
		'as'	=> 'cadastrar' // -< Rota nomeada
	]);

	// Post Cadastrar
	Route::post('/cadastrar', [
		'uses' 	=> 'RegisterController@postCadastrar',
		'as'	=> 'post-cadastrar' // -< Rota nomeada
	]);

});
/***************************//****************************/

/******************* ProfileController *******************/
Route::group(['namespace' => 'Profile'], function(){

	// Perfil
	Route::get('profile', [
		'uses' 	=> 'ProfileController@index',
		'as'	=> 'perfil' // -< Rota nomeada
	]);

	// Editar Perfil
	Route::get('profile/editar', [
		'uses' 	=> 'ProfileController@editarPerfil',
		'as'	=> 'editar-perfil' // -< Rota nomeada
	]);

	// Post Editar Perfil
	Route::post('profile/editar', [
		'uses' 	=> 'ProfileController@postEditarPerfil',
		'as'	=> 'post-editar-perfil' // -< Rota nomeada
	]);

	// Cadastrar/Editar Categorias
	Route::get('profile/editar/categorias', [
		'uses' 	=> 'ProfileController@editarCategorias',
		'as'	=> 'editar-categorias' // -< Rota nomeada
	]);

	// Post Cadastrar/Editar Categorias
	Route::post('profile/editar/categorias', [
		'uses' 	=> 'ProfileController@postEditarCategorias',
		'as'	=> 'post-editar-categorias' // -< Rota nomeada
	]);

	// Cadastrar/Editar Serviços
	Route::get('profile/editar/servicos', [
		'uses' 	=> 'ProfileController@editarServicos',
		'as'	=> 'editar-servicos' // -< Rota nomeada
	]);

	// Post Cadastrar/Editar Serviços
	Route::post('profile/editar/servicos', [
		'uses' 	=> 'ProfileController@postEditarServicos',
		'as'	=> 'post-editar-servicos' // -< Rota nomeada
	]);

	// Cadastrar/Editar Especialidades
	Route::get('profile/editar/especialidades', [
		'uses' 	=> 'ProfileController@editarEspecialidades',
		'as'	=> 'editar-especialidades' // -< Rota nomeada
	]);

	// Post Cadastrar/Editar Especialidades
	Route::post('profile/editar/especialidades', [
		'uses' 	=> 'ProfileController@postEditarEspecialidades',
		'as'	=> 'post-editar-especialidades' // -< Rota nomeada
	]);

});
/***************************//****************************/

/******************* AccountController *******************/

Route::group(['namespace' => 'Account'], function(){

	// Editar Conta
	Route::get('minha-conta/editar', [
		'uses' 	=> 'AccountController@editarConta',
		'as'	=> 'editar-conta' // -< Rota nomeada
	]);

	// Post Editar Conta
	Route::post('minha-conta/editar', [
		'uses' 	=> 'AccountController@postEditarConta',
		'as'	=> 'post-editar-conta' // -< Rota nomeada
	]);

});
/***************************//****************************/