<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/padrinho/cadastrar',[
		'uses'=>'FrontEndController@create',
		'as'=>'padrinho.cadastrar'
	]);

Route::post('/padrinho/registar',[
		'uses'=>'FrontEndController@store',
		'as'=>'padrinho.registar'
	]);


Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	//dashboard
	Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');

	//categorias
	Route::post('/categoria/salvar',[
		'uses'=>'CategoriaController@store',
		'as'=>'categoria.salvar'
	]);

	Route::post('/categoria/{id}/atualizar',[
		'uses'=>'CategoriaController@update',
		'as'=>'categoria.atualizar'
	]);

	Route::get('/categoria/cadastrar',[
		'uses'=>'CategoriaController@create',
		'as'=>'categoria.cadastrar'
	]);

	Route::get('/categoria/{id}/editar',[
		'uses'=>'CategoriaController@edit',
		'as'=>'categoria.editar'
	]);

	

	Route::get('/categoria/{id}/deletar',[
		'uses'=>'CategoriaController@destroy',
		'as'=>'categoria.deletar'
	]);

	Route::get('/categorias',[
		'uses'=>'CategoriaController@index',
		'as'=>'categorias'
	]);

	//padrinhos

	Route::post('/padrinho/salvar',[
		'uses'=>'PadrinhoController@store',
		'as'=>'padrinho.salvar'
	]);

	Route::post('/padrinho/{id}/atualizar',[
		'uses'=>'PadrinhoController@update',
		'as'=>'padrinho.atualizar'
	]);

	Route::get('/padrinho/cadastrar',[
		'uses'=>'PadrinhoController@create',
		'as'=>'padrinho.cadastrar'
	]);

	Route::get('/padrinho/{id}/editar',[
		'uses'=>'PadrinhoController@edit',
		'as'=>'padrinho.editar'
	]);

	

	Route::get('/padrinho/{id}/deletar',[
		'uses'=>'PadrinhoController@destroy',
		'as'=>'padrinho.deletar'
	]);

	Route::get('/padrinhos',[
		'uses'=>'PadrinhoController@index',
		'as'=>'padrinhos'
	]);  

	//criancas

	Route::get('/criancas',[
		'uses'=>'CriancaController@index',
		'as'=>'criancas'
	]); 


	Route::post('/crianca/salvar',[
		'uses'=>'CriancaController@store',
		'as'=>'crianca.salvar'
	]);

	Route::post('/crianca/{id}/atualizar',[
		'uses'=>'CriancaController@update',
		'as'=>'crianca.atualizar'
	]);

	Route::get('/crianca/cadastrar',[
		'uses'=>'CriancaController@create',
		'as'=>'crianca.cadastrar'
	]);

	Route::get('/crianca/{id}/editar',[
		'uses'=>'CriancaController@edit',
		'as'=>'crianca.editar'
	]);

	Route::get('/crianca/{id}/deletar',[
		'uses'=>'CriancaController@destroy',
		'as'=>'crianca.deletar'
	]);

	

	//usuarios

	Route::get('/usuarios',[
		'uses'=>'UsuarioController@index',
		'as'=>'usuarios'
	])->middleware('admin');


	Route::get('/usuario/{id}/deletar',[
		'uses'=>'UsuarioController@destroy',
		'as'=>'usuario.deletar'
	])->middleware('admin');

	Route::get('/usuario/{id}/editar',[
		'uses'=>'UsuarioController@edit',
		'as'=>'usuario.editar'
	])->middleware('admin');

	Route::get('/usuario/cadastrar',[
		'uses'=>'UsuarioController@create',
		'as'=>'usuario.cadastrar'
	])->middleware('admin');

	Route::post('/usuario/salvar',[
		'uses'=>'UsuarioController@store',
		'as'=>'usuario.salvar'
	])->middleware('admin');

	Route::post('/usuario/{id}/atualizar',[
		'uses'=>'UsuarioController@update',
		'as'=>'usuario.atualizar'
	])->middleware('admin');

	//outras rotas

	Route::get('/ajuda',[
		'uses'=>'HomeController@ajuda',
		'as'=>'ajuda'
	]);

	Route::get('/sobre',[
		'uses'=>'HomeController@sobre',
		'as'=>'sobre'
	]);
	


	//====================== Rotas de Apadrinhamento ==========================


Route::get('/apadrinhamento', [
		'uses' =>'CentroController@index',
		'as' => 'apadrinhamento'
	]);

Route::get('/apadrinhar/{id}', [
		'uses' => 'CentroController@apadrinhar',
		'as' => 'apadrinhar'
	]);

Route::get('/padrinho_crianca/{id_padrinho}/{id_crianca}', [
		'uses' => 'CentroController@guardar',
		'as' => 'padrinho_crianca'
	]);

Route::get('/padrinho_crianca_remove/{id_padrinho}/{id_crianca}', [
		'uses' => 'CentroController@remover',
		'as' => 'p_c_r'
	]);

Route::get('/lista_apadrinhamento',[
		'uses' => 'CentroController@listarPadrinhoCrianca',
		'as' => 'lista_apadrinhamento'
	]);





});

