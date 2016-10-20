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
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

/* Aris*/
Route::get('consulta', 'ConsultaController@index');
Route::get('ingreso', 'IngresoController@index');
Route::get('consultaDeUnidad', 'ConsultaEspecificaController@index');
Route::post('consultaDeUnidad', 'ConsultaEspecificaController@seleccion');

Route::post('consulta', 'ConsultaController@filtro');
