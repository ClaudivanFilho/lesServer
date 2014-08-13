<?php

class ReceitaController extends \BaseController {

    public function create() {
        return View::make('cadastrarReceita');
    }

    public function show($id){
        $receita = Receita::findOrFail($id);
        return View::make('receita', compact('receita'));
    }

	public function store()
	{
        $rec              = new Receita();
        $rec->nome        = Input::get('nome');
        $rec->nota        = Input::get('number');
        $rec->numPessoas  = Input::get('numDePessoas');
        $rec->categoria   = Input::get('categoria');
        $rec->tempo       = Input::get('tempo');
        $rec->infoNutri   = Input::get('infNutricional');
        $rec->modoPreparo = Input::get('modoPreparo');
        $rec->path_img = Input::get('path_img');
        $rec->save();
        $index = 0;
        foreach (Input::get('ingredientes') as $ing) {
            $rec->addIng($ing,
                         Input::get('medidas')[$index],
                         Input::get('quantidades')[$index]
            );
            $index = $index + 1;
        }
        $tags = explode(',', Input::get('tags'));

        Recipe::saveTags($tags, $rec);
        return Input::all();
	}

}