<?php

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/developers', ['uses' => 'HomeController@devs', 'as' => 'devs']);
Route::post('/sendEmail', ['as' => 'sendEmail', 'uses' => 'HomeController@sendEmail']);

Route::get('/receita/nova', ['uses' => 'ReceitaController@create']);
Route::get('/receita/{id}', ['uses' => 'ReceitaController@show']);

Route::post('/receita/nova', ['uses' => 'ReceitaController@store']);

Route::get('/receitas', function () {
    return Response::json(Receita::all(), 200, [], JSON_PRETTY_PRINT);
});

Route::get('/ingredientes', function () {
    return Response::json(Ingrediente::all(), 200, [], JSON_PRETTY_PRINT);
});

Route::get('/receitaing', function () {
    return Response::json(ReceitaIngrediente::with('ingrediente')->get(), 200, [], JSON_PRETTY_PRINT);
});

Route::resource('recipes', 'RecipesController');

// API ===================
Route::get('api/setNota', ['uses' => 'ApiController@setNota']);
Route::get('api/receitas', ['uses' => 'ApiController@findReceitas']);
Route::get('api/receitasrestritas', ['uses' => 'ApiController@findRestritas']);


