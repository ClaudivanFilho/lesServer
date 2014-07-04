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

Route::get('/receita/nova', function () {
	return View::make('cadastrarReceita');
});
//'nome', 'nota', 'numPessoas',
//'categoria', 'tempo', 'infoNutri',
//                           'modoPreparo'
Route::post('/receita/nova', function () {
    $rec = new Receita();
    $rec->nome = Input::get('nome');
    $rec->nota = Input::get('nota');
    $rec->numPessoas = Input::get('numDePessoas');
    $rec->nota = Input::get('categoria');
    $rec->tempo = Input::get('tempo');
    $rec->infoNutri = Input::get('infNutricional');
    $rec->modoPreparo = Input::get('modoPreparo');
    $rec->save();
    $index = 0;
    foreach (Input::get('ingredientes') as $ing) {
        $i = new Ingrediente(['nome' => $ing]);
        $i->save();
        $ri = new ReceitaIngrediente([
            'medida' => Input::get('medidas')[$index],
            'quantidade' => Input::get('quantidades')[$index]
                                     ]);
        $ri->receita()->associate($rec);
        $ri->ingrediente()->associate($i);
        $ri->save();
        $index = $index + 1;
    }
    $tags = explode(',', Input::get('tags'));
    foreach ($tags as $tag) {
        $t = Tag::where('nome', '=', $tag)->first();
        if(is_null($t)) {
            $t = new Tag(['nome' => $tag]);
            $t->save();
        }
        $rt = new ReceitaTag();
        $rt->receita()->associate($rec);
        $rt->tag()->associate($t);
        $rt->save();
    }
    return Input::all();
});

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


