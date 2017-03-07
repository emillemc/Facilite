<?php

/********************** AppController ********************/
Route::group(['namespace' => 'App'], function(){

	// Home
	Route::get('/', [
		'uses' 	=> 'AppController@index',
		'as'	=> 'home' // <- Rota nomeada
	]);

	// // Moda e Beleza
	// Route::get('/{categoria?}', [
	// 	'uses' 	=> 'AppController@listarServicos',
	// 	'as'	=> 'moda-beleza' // <- Rota nomeada
	// ]);
	
	// // Casa
	// Route::get('/casa', [
	// 	'uses' 	=> 'AppController@listarServicos',
	// 	'as'	=> 'casa' // <- Rota nomeada
	// ]);
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

});
/***************************//****************************/




/* Auth do Laravel */

// Auth::routes();