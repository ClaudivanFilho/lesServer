<?php

class Ingrediente extends \Eloquent {
	protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function receitas() {
        return $this->hasMany('ReceitaIngrediente')->with('receita');
    }

    public function recs() {
        return $this->receitas()->with('receita', 'receita.ingredientes')->get()->fetch('receita');
    }
}