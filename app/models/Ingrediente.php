<?php

class Ingrediente extends \Eloquent {
	protected $fillable = ['nome'];

    public function receitas() {
        return $this->hasMany('ReceitaIngrediente')->with('receita');
    }
}