<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return Redirect::to('/receita/nova');
});

Route::get('/receita/nova', ['uses' => 'ReceitaController@create']);

Route::post('/receita/nova', ['uses' => 'ReceitaController@store']);

Route::get('/receitas', function () {
    return Receita::all();
});

Route::get('/ingredientes', function () {
    return Ingrediente::all();
});

Route::get('/receitaing', function () {
    return ReceitaIngrediente::all();
});

Route::get('/receitatags', function () {
    return ReceitaTag::all();
});

// API ///////////////
Route::get('api/receitas', ['uses' => 'ApiController@findReceitas']);
