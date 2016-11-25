<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/auth/logout',function(){
	Auth::logout();
	return view('auth.login');
});
Route::get('/', 'indexController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
Route::group(['prefix'=>'admin','middleware'=>'auth.role:admin'],function(){

	Route::get('','indexController@index');
	Route::get('solicitar-visita','AgendarVisitaController@index');
			//Route::post('solicitar-visita/buscaEmpresa','AgendarVisitaController@index');
	Route::post('solicitar-visita/buscaEmpresa', ['as' => 'admin.solicitar-visita.buscaEmpresa', 'uses' =>'AgendarVisitaController@pesquisar']);
	
});

