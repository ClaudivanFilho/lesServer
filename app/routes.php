<?php

Route::get('/', function() {
	return Redirect::to('/receita/nova');
});

Route::get('/receita/nova', ['uses' => 'ReceitaController@create']);

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

Route::get('/tags', function () {
    return Response::json(Tag::all(), 200, [], JSON_PRETTY_PRINT);
});

// API ///////////////
Route::get('api/receitas', ['uses' => 'ApiController@findReceitas']);
