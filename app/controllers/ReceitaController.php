<?php

class ReceitaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /receita
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /receita/nova
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('cadastrarReceita');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /receita
	 *
	 * @return Response
	 */
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
        foreach ($tags as $tag) {
            $t = Tag::where('nome', '=', $tag)->first();
            if (is_null($t)) {
                $t = new Tag(['nome' => $tag]);
                $t->save();
            }
            $rt = new ReceitaTag();
            $rt->receita()->associate($rec);
            $rt->tag()->associate($t);
            $rt->save();
        }
        return Input::all();
	}

	/**
	 * Display the specified resource.
	 * GET /receita/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /receita/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /receita/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /receita/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}