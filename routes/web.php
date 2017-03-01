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

	// Cadastrar Categorias
	Route::get('/cadastrar/categorias', [
		'uses' 	=> 'RegisterController@cadastrarCategorias',
		'as'	=> 'cadastrar-categorias' // -< Rota nomeada
	]);

	// Post Cadastrar Categorias
	Route::post('/cadastrar/categorias', [
		'uses' 	=> 'RegisterController@postCadastrarCategorias',
		'as'	=> 'post-cadastrar-categorias' // -< Rota nomeada
	]);

});
/***************************//****************************/




/* Auth do Laravel */

// Auth::routes();