<?php

class RecipesController extends \BaseController {

	public function index()
	{
		$recipes = Receita::all();

		return View::make('recipes.index', compact('recipes'));
	}

	public function create()
	{
		return View::make('recipes.create');
	}

	public function store()
	{
		$validator = Validator::make($data = Input::all(), Receita::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Receita::create($data);

		return Redirect::route('recipes.index');
	}

	public function show($id)
	{
		$receita = Receita::findOrFail($id);

		return View::make('recipes.show', compact('receita'));
	}

	public function edit($id)
	{
		$receita = Receita::find($id);

		return View::make('recipes.edit', compact('receita'));
	}

	public function update($id)
	{
		$recipe = Receita::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Receita::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$recipe->update($data);

		return Redirect::route('recipes.index');
	}

	public function destroy($id)
	{
		Receita::destroy($id);

		return Redirect::route('recipes.index');
	}

}
