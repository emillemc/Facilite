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

	// Listar Perfil Profissional passando a url do perfil
	Route::get('/profiles/{urlPerfil?}', [
		'uses' 	=> 'AppController@listarPerfis'
	]);


});

/***************************//****************************/

/******************** AuthController *********************/
Route::group(['namespace' => 'Auth'], function(){

	// Login
	Route::get('/login', [
		'uses' 	=> 'LoginController@index',
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

/******************* ProfileController / Prefix 'profile/' *******************/
Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function(){

	// Perfil
	Route::get('/', [
		'uses' 	=> 'ProfileController@index',
		'as'	=> 'my-profile' // -< Rota nomeada
	]);

	// Editar Perfil
	Route::get('/editar', [
		'uses' 	=> 'ProfileController@editarPerfil',
		'as'	=> 'editar-perfil' // -< Rota nomeada
	]);

	// Post Editar Perfil
	Route::post('/editar', [
		'uses' 	=> 'ProfileController@postEditarPerfil',
		'as'	=> 'post-editar-perfil' // -< Rota nomeada
	]);

	// Cadastrar/Editar Categorias
	Route::get('/editar/categorias', [
		'uses' 	=> 'ProfileController@editarCategorias',
		'as'	=> 'editar-categorias' // -< Rota nomeada
	]);

	// Post Cadastrar Categorias (Primeiro cadastro)
	Route::post('/editar/categorias', [
		'uses' 	=> 'ProfileController@postCadastrarCategorias',
		'as'	=> 'post-cadastrar-categorias' // -< Rota nomeada
	]);

	// Post Editar Categorias
	Route::post('/edit/categorias', [
		'uses' 	=> 'ProfileController@postEditarCategorias',
		'as'	=> 'post-editar-categorias' // -< Rota nomeada
	]);

	// Cadastrar/Editar Serviços
	Route::get('/editar/servicos', [
		'uses' 	=> 'ProfileController@editarServicos',
		'as'	=> 'editar-servicos' // -< Rota nomeada
	]);

	// Post Cadastrar Serviços (Primeiro cadastro)
	Route::post('/editar/servicos', [
		'uses' 	=> 'ProfileController@postCadastrarServicos',
		'as'	=> 'post-cadastrar-servicos' // -< Rota nomeada
	]);

	// Post Editar Serviços
	Route::post('/edit/servicos', [
		'uses' 	=> 'ProfileController@postEditarServicos',
		'as'	=> 'post-editar-servicos' // -< Rota nomeada
	]);

	// Cadastrar/Editar Especialidades
	Route::get('/editar/especialidades', [
		'uses' 	=> 'ProfileController@editarEspecialidades',
		'as'	=> 'editar-especialidades' // -< Rota nomeada
	]);

	// Post Cadastrar Especialidades (Primeiro cadastro)
	Route::post('/editar/especialidades', [
		'uses' 	=> 'ProfileController@postCadastrarEspecialidades',
		'as'	=> 'post-cadastrar-especialidades' // -< Rota nomeada
	]);

	// Post Editar Especialidades
	Route::post('/edit/especialidades', [
		'uses' 	=> 'ProfileController@postEditarEspecialidades',
		'as'	=> 'post-editar-especialidades' // -< Rota nomeada
	]);

	// Post Cadastrar/Editar Url
	Route::post('/editar/url', [
		'uses' 	=> 'ProfileController@postEditarUrl',
		'as'	=> 'post-editar-url' // -< Rota nomeada
	]);

	// Post Cadastrar/Editar Descrição
	Route::post('/editar/descricao', [
		'uses' 	=> 'ProfileController@postEditarDescricao',
		'as'	=> 'post-editar-descricao' // -< Rota nomeada
	]);

});
/***************************//****************************/

/******************* AccountController *******************/

Route::group(['namespace' => 'Account', 'prefix' => 'minha-conta'], function(){

	// Editar Conta User
	Route::get('/editar', [
		'uses' 	=> 'AccountController@index',
		'as'	=> 'editar-conta' // -< Rota nomeada
	]);

	// Post Editar Conta User
	Route::post('/editar', [
		'uses' 	=> 'AccountController@postEditarContaUser',
		'as'	=> 'post-editar-conta-user' // -< Rota nomeada
	]);

	// Post Editar Conta Prof
	Route::post('/edit', [
		'uses' 	=> 'AccountController@postEditarContaProf',
		'as'	=> 'post-editar-conta-prof' // -< Rota nomeada
	]);

});
/***************************//****************************/