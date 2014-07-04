<?php

class Receita extends \Eloquent {
	protected $fillable = ['nome', 'nota', 'numPessoas',
                           'categoria', 'tempo', 'infoNutri',
                           'modoPreparo'];

    public function ingredientes() {
        return $this->hasMany('ReceitaIngrediente')->with('ingrediente');
    }

    public function tags() {
        return $this->hasMany('ReceitaTag')->with('tag');
    }
}